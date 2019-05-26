<?php

namespace App\Controller;

use App\Entity\Invite;
use App\Form\InviteType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class InviteController
 * @package App\Controller
 */
class InviteController extends AbstractController
{
    /**
     * @Route("/invite/store/{inviteId}", name="invite", methods={"POST"}, requirements={"inviteId"="\d+"})
     * @param Request $request
     * @param int $inviteId
     * @return Response
     */
    public function store(Request $request, int $inviteId = 0) :Response
    {
        $em = $this->getDoctrine()->getManager();

        $invite = ($inviteId === 0) ? new Invite() : $em->getRepository(Invite::class)->find($inviteId);
        if($invite === NULL){
            return new Response('Neteisingas invite ID', Response::HTTP_BAD_REQUEST);
        }
        $form = $this->createForm(InviteType::class, $invite);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            $em->persist($invite);
            $em->flush();
            return new Response(Response::HTTP_OK);
        }

        return new Response($form->getErrors(true)[0]->getMessage(), Response::HTTP_BAD_REQUEST);
    }
}
