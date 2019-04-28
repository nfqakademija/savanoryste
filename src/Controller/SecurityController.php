<?php

namespace App\Controller;

use App\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\HttpFoundation\Session\Session;

class SecurityController extends AbstractController
{
    /**
     * @Route("/login", name="Login", methods={"POST"})
     */
    public function login(Request $request, UserPasswordEncoderInterface $encoder) :Response
    {
        $username = $this->sanitizeInput($request->request->get('username'));
        $password = $this->sanitizeInput($request->request->get('password'));

        if(!$username || !$password){
            return new Response(Response::HTTP_FORBIDDEN);
        }

        $user = $this->getDoctrine()->getRepository(User::class)->findBy(['username' => $username]);

        if(!$user){
            return new Response(Response::HTTP_FORBIDDEN);
        }

        if(!$encoder->isPasswordValid($user[0],$password)){
            return new Response(Response::HTTP_FORBIDDEN);
        }

        $session = new Session();
        $session->set('username', $username);

        return new Response(Response::HTTP_OK);
    }

    /**
     * @return Response
     * @Route("/register", name="Register", methods={"POST"})
     */
    public function register(Request $request, UserPasswordEncoderInterface $encoder) :Response
    {
        if(!$this->isCsrfTokenValid('register_user', $request->request->get('_csrf_token'))){
            // TODO
            // generate some output or throw exception
            //return new Response(Response::HTTP_BAD_REQUEST);
        }

        $username = $this->sanitizeInput($request->request->get('username'));
        $password = $this->sanitizeInput($request->request->get('password'));
        $role     = $this->sanitizeInput(strtolower($request->request->get('role')));

        if($username && $password){

            $isUsernameTaken = $this->getDoctrine()->getRepository(User::class)->isUsernameTaken($username);
            if($isUsernameTaken){
                return new Response('Toks vartotojas jau egzistuoja!', Response::HTTP_BAD_REQUEST);
            }

            $user = new User();

            $user->setUsername($username);
            $user->setPassword(
                $encoder->encodePassword($user, $password)
            );
            $roles = ($role === 'organisation') ? ['Organisation'] : ['Volunteer'];
            $user->setRoles($roles);

            $em = $this->getDoctrine()->getManager();
            $em->persist($user);
            $em->flush();

            return new Response(Response::HTTP_OK);
        }

        return new Response(Response::HTTP_BAD_REQUEST);
    }


    private function sanitizeInput(?string $input) :string
    {
        return htmlspecialchars($input, ENT_QUOTES, 'UTF-8');
    }

}
