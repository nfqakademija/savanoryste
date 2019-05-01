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
     * @Route("/register/{type}", name="Register", methods={"GET", "POST"})
     */
    public function register(Request $request, UserPasswordEncoderInterface $encoder, ValidatorInterface $validator, string $type = 'volunteer') :Response
    {
        $user = new User();

        $form = $this->createForm(UserType::class, $user);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            $errors = $validator->validate($user);

            if(count($errors) > 0){
                return new Response($errors, Response::HTTP_BAD_REQUEST);
            }
            $user = $form->getData();

            $isUsernameTaken = $this->getDoctrine()->getRepository(User::class)->isUsernameTaken($form->getData()->getUsername());
            if($isUsernameTaken){
                $this->addFlash('error', 'Vartotojo vardas užimtas');
                return $this->redirectToRoute('Register');
            }

            $user->setPassword(
                $encoder->encodePassword($user, $form->getData()->getPassword())
            );

            $user->setRoles([$this->getRole(strtolower($type))]);
            $em = $this->getDoctrine()->getManager();
            $em->persist($user);
            $em->flush();

            $this->addFlash('success','Registracija pavyko.Sveiki, '.$user->getUsername());
            return $this->redirectToRoute('home');
        }

        return $this->render('security/register.html.twig',[
            'registerForm'      => $form->createView()
        ]);

    }

    /**
     * @param String $type
     * @return null|string
     */
    private function getRole(String $type) :?string
    {
        switch ($type){
            case 'volunteer':
                return 'ROLE_VOLUNTEER';
            case 'organisation':
                return 'ROLE_ORGANISATION';
            default:
                return 'ROLE_VOLUNTEER';
        }
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

}
