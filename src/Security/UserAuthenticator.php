<?php

namespace App\Security;

use App\Constants\RoleConstants;
use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface as EntityManager;
use Symfony\Component\HttpFoundation\Cookie;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface as UrlGenerator;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Core\Exception\CustomUserMessageAuthenticationException;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface as PasswordEncoder;
use Symfony\Component\Security\Core\Security;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Core\User\UserProviderInterface;
use Symfony\Component\Security\Csrf\CsrfToken;
use Symfony\Component\Security\Csrf\CsrfTokenManagerInterface as CsrfTokenManager;
use Symfony\Component\Security\Guard\Authenticator\AbstractFormLoginAuthenticator;
use Symfony\Component\Security\Http\Util\TargetPathTrait;

/**
 * Class UserAuthenticator
 * @package App\Security
 */
class UserAuthenticator extends AbstractFormLoginAuthenticator
{
    use TargetPathTrait;

    private $entityManager;
    private $urlGenerator;
    private $passwordEncoder;
    private $csrfTokenManager;


    /**
     * UserAuthenticator constructor.
     * @param CsrfTokenManager $token
     * @param EntityManager $em
     * @param UrlGenerator $url
     * @param PasswordEncoder $encoder
     */
    public function __construct(CsrfTokenManager $token, EntityManager $em, UrlGenerator $url, PasswordEncoder $encoder)
    {
        $this->entityManager = $em;
        $this->urlGenerator = $url;
        $this->passwordEncoder = $encoder;
        $this->csrfTokenManager = $token;
    }

    /**
     * @param Request $request
     * @return bool
     */
    public function supports(Request $request)
    {
        return 'app_login' === $request->attributes->get('_route')
            && $request->isMethod('POST');
    }

    /**
     * @param Request $request
     * @return array|mixed
     */
    public function getCredentials(Request $request)
    {
        $credentials = [
            'username' => $request->request->get('login')['username'],
            'password' => $request->request->get('login')['password'],
            'csrf_token' => $request->request->get('login')['_token']
        ];

        $request->getSession()->set(
            Security::LAST_USERNAME,
            $credentials['username']
        );

        return $credentials;
    }

    /**
     * @param mixed $credentials
     * @param UserProviderInterface $userProvider
     * @return null|object|UserInterface
     */
    public function getUser($credentials, UserProviderInterface $userProvider)
    {
        $token = new CsrfToken('login_auth', $credentials['csrf_token']);
        if (!$this->csrfTokenManager->isTokenValid($token)) {
            throw new CustomUserMessageAuthenticationException('Token nesutapo. Bandykite dar karta');
        }

        $user = $this->entityManager->getRepository(User::class)->findOneBy(
            ['username' => $credentials['username']]
        );

        if (!$user) {
            throw new CustomUserMessageAuthenticationException('Naudotojas nerastas');
        }

        return $user;
    }

    /**
     * @param mixed $credentials
     * @param UserInterface $user
     * @return bool
     */
    public function checkCredentials($credentials, UserInterface $user)
    {
        $isPasswordValid = $this->passwordEncoder->isPasswordValid($user, $credentials['password']);
        if (!$isPasswordValid) {
            throw new CustomUserMessageAuthenticationException('Prisijungimo duomenys neteisingi');
        }

        return $isPasswordValid;
    }

    /**
     * @param Request $request
     * @param TokenInterface $token
     * @param string $providerKey
     * @return null|RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function onAuthenticationSuccess(Request $request, TokenInterface $token, $providerKey)
    {
        $user = $this->entityManager->getRepository(User::class)->findOneBy(
            ['username' => $request->request->get($this->getCurrentRequestUri($request))['username']]
        );

        if ($targetPath = $this->getTargetPath($request->getSession(), $providerKey)) {
            return new RedirectResponse($targetPath);
        }

        $response = $this->generateRedirectResponse($user->getRoles(), $user->getProfileId(), $user);
        return $response->send();
    }

    /**
     * @param array $roles
     * @param int $profileId
     * @param User $user
     * @return RedirectResponse
     */
    private function generateRedirectResponse(array $roles, int $profileId, User $user) :RedirectResponse
    {
        if (in_array(RoleConstants::ROLE_ORGANISATION, $roles, true)) {
            $response = new RedirectResponse('/profile/organisation/'. $profileId);
        } elseif (in_array(RoleConstants::ROLE_VOLUNTEER, $roles, true)) {
            $response = new RedirectResponse('/profile/'. $profileId);
        } else {
            $response = new RedirectResponse('/');
        }

        $response->headers->setCookie(new Cookie('userId', $user->getId(), time() + 3600, '/', null, false, false));
        $response->headers->setCookie(new Cookie('role', $roles[0], time() + 3600, '/', null, false, false));
        return $response;
    }

    /**
     * @return string
     */
    protected function getLoginUrl()
    {
        return $this->urlGenerator->generate('app_login');
    }


    /**
     * @param Request $request
     * @return string
     */
    private function getCurrentRequestUri(Request $request) :string
    {
        return ltrim($request->server->get('REQUEST_URI'), '/');
    }
}
