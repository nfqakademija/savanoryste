<?php

namespace App\Controller;

use App\Entity\Volunteer;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;

/**
 * Class ApiController
 * @package App\Controller
 */
class ApiController extends AbstractController
{
    /**
     * @Route("/api/volunteers", name="fetchAllVolunteers", methods={"GET"})
     * @param SerializerInterface $serializer
     * @return JsonResponse
     */
    public function fetchAllVolunteers(SerializerInterface $serializer) :JsonResponse
    {
        $volunteers = $this->getDoctrine()->getRepository(Volunteer::class)->findAll();
        $serialized = $serializer->serialize($volunteers, 'json');
        return JsonResponse::fromJsonString(
            $serialized,
            200,
            ['content-type' => 'application/json']
        );
    }

    /**
     * @Route("api/volunteer/{id}", name="fetchSingleVolunteer", methods={"GET"}, requirements={"id"="\d+"})
     * @param SerializerInterface $serializer
     * @return JsonResponse
     */
    public function fetchSingleVolunteer(SerializerInterface $serializer, int $id = 1):JsonResponse
    {
        $volunteer = $this->getDoctrine()->getRepository(Volunteer::class)->find($id);
        $serialized = $serializer->serialize($volunteer, 'json');
        return JsonResponse::fromJsonString(
            $serialized,
            200,
            ['content-type' => 'application/json']
        );
    }

}
