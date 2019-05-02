<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\UserType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
use Symfony\Component\Validator\Validator\ValidatorInterface;

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

        $form = $this->createForm(UserType::class);

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
    public function register(Request $request, UserPasswordEncoderInterface $encoder, ValidatorInterface $validator) :Response
    {
        $user = new User();

        $form = $this->createForm(UserType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $errors = $validator->validate($user);

            if (count($errors) > 0) {
                return new Response($errors, Response::HTTP_BAD_REQUEST);
            }
            $user = $form->getData();

            $isUsernameTaken = $this->getDoctrine()->getRepository(User::class)->isUsernameTaken($form->getData()->getUsername());
            if ($isUsernameTaken) {
                return $this->redirectOnError('Register', 'Vartotojo vardas užimtas');
            }

            if (!$this->isRoleSelected($request)) {
                return $this->redirectOnError('Register', 'Pasirinkite role');
            }

            if (!$this->hasPasswordMatched($request)) {
                return $this->redirectOnError('Register', 'Slaptažodžiai nesutapo. Prašome įvesti dar karta');
            }

            $user->setPassword(
                $encoder->encodePassword($user, $form->getData()->getPassword())
            );

            $user->setRoles([$this->getRole($request)]);

            $em = $this->getDoctrine()->getManager();
            $em->persist($user);
            $em->flush();

            $this->addFlash('success', 'Registracija pavyko.Sveiki, '.$user->getUsername());
            return $this->redirectToRoute('home');
        }

        return $this->render('security/register.html.twig', [
            'registerForm'      => $form->createView()
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
            return 'ROLE_VOLUNTEER';
        } elseif ($request->request->get('ROLE_ORGANISATION') === 'on') {
            return 'ROLE_ORGANISATION';
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
     * @param Request $request
     * @return bool
     */
    private function hasPasswordMatched(Request $request) :bool
    {
        return ($request->request->get('user')['password'] === $request->request->get('password_repeat')) ? true : false;
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
