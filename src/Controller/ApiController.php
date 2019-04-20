<?php

namespace App\Controller;

use App\Entity\Event;
use App\Entity\Volunteer;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use App\Utils\Utils;


/**
 * Class ApiController
 * @package App\Controller
 */
class ApiController extends AbstractController
{
    /**
     * @Route("/api/volunteers", name="fetchAllVolunteers", methods={"GET"})
     * @return JsonResponse
     */
    public function fetchAllVolunteers() :JsonResponse
    {
        $volunteers = $this->getDoctrine()->getRepository(Volunteer::class)->AllVolunteers();
        $structured = Utils::VolunteerStructurize($volunteers,$this->getDoctrine()->getRepository(Event::class));
        return new JsonResponse(
            $structured,
            200,
            ['content-type' => 'application/json'],
            false
        );

    }

    /**
     * @Route("api/volunteer/{id}", name="fetchSingleVolunteer", methods={"GET"}, requirements={"id"="\d+"})
     * @param int $id
     * @return JsonResponse
     */
    public function fetchSingleVolunteer(int $id):JsonResponse
    {
        $volunteer = $this->getDoctrine()->getRepository(Volunteer::class)->SingleVolunteer($id);
        $structured = Utils::VolunteerStructurize($volunteer,$this->getDoctrine()->getRepository(Event::class));
        return new JsonResponse(
            $structured,
            200,
            ['content-type' => 'application/json'],
            false
        );
    }

    /**
     * @Route("api/events")
     * @return JsonResponse
     */
    public function fetchAllEvents() :JsonResponse
    {
        $events = $this->getDoctrine()->getRepository(Event::class)->getAllEvents();

        return new JsonResponse(
            ['Events'   => $events],
            200,
            ['content-type' => 'application/json'],
            false
        );
    }

}
