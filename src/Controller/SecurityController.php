<?php

namespace App\Controller;

use App\Entity\Organisation;
use App\Entity\User;
use App\Entity\Volunteer;
use App\Form\LoginType;
use App\Form\RegisterType;
use App\Security\UserAuthenticator;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Security\Guard\GuardAuthenticatorHandler;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
use App\Constants\RoleConstants;
use Symfony\Component\Security\Http\Logout\LogoutSuccessHandlerInterface;

/**
 * Class SecurityController
 * @package App\Controller
 */
class SecurityController extends AbstractController implements LogoutSuccessHandlerInterface
{

    private $encoder;
    private $guardHandler;
    private $authenticator;

    /**
     * SecurityController constructor.
     * @param UserPasswordEncoderInterface $e
     * @param GuardAuthenticatorHandler $g
     * @param UserAuthenticator $auth
     */
    public function __construct(UserPasswordEncoderInterface $e, GuardAuthenticatorHandler $g, UserAuthenticator $auth)
    {
        $this->encoder = $e;
        $this->guardHandler = $g;
        $this->authenticator = $auth;
    }

    /**
     * @Route("/login", name="app_login", methods={"GET", "POST"})
     * @param AuthenticationUtils $authenticationUtils
     * @return Response
     */
    public function login(AuthenticationUtils $authenticationUtils): Response
    {
        $error = $authenticationUtils->getLastAuthenticationError();
        $lastUsername = $authenticationUtils->getLastUsername();

        $form = $this->createForm(LoginType::class);

        return $this->render('security/login.html.twig', [
            'last_username'     => $lastUsername,
            'error'             => $error,
            'loginForm'         => $form->createView()
        ]);
    }

    /**
     * @param Request $request
     * @param UserPasswordEncoderInterface $encoder
     * @param string $type
     * @return Response
     * @Route("/register", name="Register", methods={"GET", "POST"})
     */
    public function register(Request $request, UrlGeneratorInterface $urlGenerator) :Response
    {
        $user = new User();

        $form = $this->createForm(RegisterType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $profile = $this->createProfileByRole($request);
            $em->persist($profile);
            $em->flush();

            $user = $form->getData();

            if (!$this->isRoleSelected($request)) {
                return $this->redirectOnError(
                    'Register',
                    'Pasirinkite role',
                    'error',
                    Response::HTTP_TEMPORARY_REDIRECT
                );
            }

            $user->setPassword(
                $this->encoder->encodePassword($user, $form->getData()->getPassword())
            );

            $user->setRoles([$this->getRole($request)]);
            $user->setProfileId($profile->getId());

            $em->persist($user);
            $em->flush();

            return $this->guardHandler->authenticateUserAndHandleSuccess(
                $user,
                $request,
                $this->authenticator,
                'main' // firewall name
            );
        }

        $this->addFlash('error', $form->getErrors(true)[0]->getMessage());
        return new RedirectResponse($urlGenerator->generate('index'));
    }

    /**
     * @Route("/logout", name="logout", methods={"GET"})
     */
    public function logout()
    {
        /*
         * No need for method implementation
         * Guard Authenticator automatically handles it
         * Only need to map its route in /config/packages/security.yaml
         */
    }

    /**
     * @param Request $request
     * @return null|object
     */
    private function createProfileByRole(Request $request) :?object
    {
        // TODO MOVE IF LOGIC TO SEPARATE METHOD
        if ($request->request->get(RoleConstants::ROLE_VOLUNTEER) === 'on') {
            $volunteer = new Volunteer();
            $volunteer->createEmpty($volunteer);
            return $volunteer;
        } elseif ($request->request->get(RoleConstants::ROLE_ORGANISATION) === 'on') {
            $organisation = new Organisation();
            $organisation->createEmpty($organisation);
            return $organisation;
        }

        return null;
    }

    /**
     * @param String $type
     * @return null|string
     */
    private function getRole(Request $request) :?string
    {
        if ($request->request->get(RoleConstants::ROLE_VOLUNTEER) === 'on') {
            return RoleConstants::ROLE_VOLUNTEER;
        } elseif ($request->request->get(RoleConstants::ROLE_ORGANISATION) === 'on') {
            return RoleConstants::ROLE_ORGANISATION;
        }
        return null;
    }

    /**
     * @param Request $request
     * @return bool
     */
    private function isRoleSelected(Request $request) :bool
    {
        $roleVolunteer = $request->request->get(RoleConstants::ROLE_VOLUNTEER);
        $roleOrganisation = $request->request->get(RoleConstants::ROLE_ORGANISATION);
        if ($roleVolunteer === 'on' || $roleOrganisation === 'on') {
            return true;
        }
        return false;
    }

    /**
     * @param string $route
     * @param string $msg
     * @param string $msgType
     * @param int $code
     * @return Response
     */
    private function redirectOnError(string $route, string $msg, $msgType = 'error', int $code = 307) :Response
    {
        $this->addFlash($msgType, $msg);
        return $this->redirectToRoute($route, [], $code);
    }

    /**
     * Creates a Response object to send upon a successful logout.
     *
     * @param Request $request
     * @return Response never null
     */
    public function onLogoutSuccess(Request $request)
    {
        $this->clearCookie('userId');
        $this->clearCookie('role');
        return new RedirectResponse('/', Response::HTTP_TEMPORARY_REDIRECT);
    }


    /**
     * @param string $cookieName
     */
    private function clearCookie(string $cookieName) :void
    {
        setcookie($cookieName, '', time() - 3600);
    }
}
