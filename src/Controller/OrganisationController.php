<?php

namespace App\Controller;

use App\Entity\Organisation;
use App\Form\OrganisationProfileType;
use App\Interfaces\RepoInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class OrganisationController
 * @package App\Controller
 */
class OrganisationController extends AbstractController implements RepoInterface
{
    /**
     * @Route("/organisation/store/{orgId}", methods={"POST"}, requirements={"orgId"="\d+"})
     * @param Request $request
     * @param int $orgId
     * @return Response
     */
    public function update(Request $request, int $orgId) :Response
    {
        $em = $this->getDoctrine()->getManager();
        $organisation = $em->getRepository(Organisation::class)->find($orgId);

        if($organisation === NULL){
            return new Response('Neteisingas organisation ID', Response::HTTP_BAD_REQUEST);
        }

        $form = $this->createForm(OrganisationProfileType::class,$organisation);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            $em->persist($organisation);
            $em->flush();
            return new Response(Response::HTTP_OK);
        }

        return new Response($form->getErrors(true)[0]->getMessage(),Response::HTTP_BAD_REQUEST);
    }

    /**
     * @Route("api/organisations", name="fetchAllOrganisations", methods={"GET"})
     */
    public function fetchAllOrganisations() :JsonResponse
    {
        return ApiController::jsonResponse($this->getRepo()->findAll());
    }

    /**
     * @Route("api/organisation/{id}", name="fetchSingleOrganisation", methods={"GET"}, requirements={"id"="\d+"})
     * @param int $id
     * @return JsonResponse
     */
    public function fetchSingleOrganisation(int $id) :JsonResponse
    {
        return ApiController::jsonResponse($this->getRepo()->findBy(['id' => $id]));
    }

    /**
     * @return null|object
     */
    public function getRepo(): ?object
    {
        return $this->getDoctrine()->getManager()->getRepository(Organisation::class);
    }
}
