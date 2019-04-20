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
     * @Route("/api/volunteers", name="api", methods={"GET", "HEAD"})
     * @param SerializerInterface $serializer
     * @return JsonResponse
     */
    public function fetchAllVolunteers(SerializerInterface $serializer)
    {
        $volunteers = $this->getDoctrine()->getRepository(Volunteer::class)->findAll();
        $serialized = $serializer->serialize($volunteers, 'json');
        return JsonResponse::fromJsonString(
            $serialized,
            200,
            ['content-type' => 'application/json']
        );
    }

}
