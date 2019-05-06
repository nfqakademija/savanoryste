<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\LoginType;
use App\Form\RegisterType;
use App\Security\UserAuthenticator;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Security\Guard\GuardAuthenticatorHandler;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
use App\Constants\RoleConstants;

/**
 * Class SecurityController
 * @package App\Controller
 */
class SecurityController extends AbstractController
{
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
    public function register(Request $request, UserPasswordEncoderInterface $encoder, GuardAuthenticatorHandler $guardHandler, UserAuthenticator $authenticator) :Response
    {
        $user = new User();

        $form = $this->createForm(RegisterType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $user = $form->getData();

            if (!$this->isRoleSelected($request)) {
                return $this->redirectOnError('Register', 'Pasirinkite role');
            }

            $user->setPassword(
                $encoder->encodePassword($user, $form->getData()->getPassword())
            );

            $user->setRoles([$this->getRole($request)]);

            $em = $this->getDoctrine()->getManager();
            $em->persist($user);
            $em->flush();


            return $guardHandler->authenticateUserAndHandleSuccess(
                $user,
                $request,
                $authenticator,
                'main' // firewall name
            );
        }

        return $this->render('security/register.html.twig', [
            'registerForm'      => $form->createView(),
            'validatorErrors'   => null
        ]);
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
     * @param String $type
     * @return null|string
     */
    private function getRole(Request $request) :?string
    {
        if ($request->request->get('ROLE_VOLUNTEER') === 'on') {
            return RoleConstants::ROLE_VOLUNTEER;
        } elseif ($request->request->get('ROLE_ORGANISATION') === 'on') {
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
        if ($request->request->get('ROLE_VOLUNTEER') === 'on' || $request->request->get('ROLE_ORGANISATION') === 'on') {
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
    private function redirectOnError(string $route, string $msg, $msgType = 'error', int $code = Response::HTTP_FOUND) :Response
    {
        $this->addFlash($msgType, $msg);
        return $this->redirectToRoute($route, [], $code);
    }
}
