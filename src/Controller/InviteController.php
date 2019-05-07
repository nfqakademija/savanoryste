<?php

namespace App\Controller;

use App\Entity\Invite;
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
     * @Route("/invite/new", name="invite", methods={"POST"})
     * @param Request $request
     * @return Response
     */
    public function new(Request $request) :Response
    {
        // TODO id validations
        $invite = new Invite();

        $invite->setUserId($request->request->get('userId'));
        $invite->setEventId($request->request->get('eventId'));
        $invite->setOrganisationId($request->request->get('organisationId'));

        $em = $this->getDoctrine()->getManager();
        $em->persist($invite);
        $em->flush();

        return new Response(Response::HTTP_OK);
    }
}
