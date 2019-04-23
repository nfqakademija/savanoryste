<?php

namespace App\Controller;

use App\Entity\Event;
use App\Entity\Organisation;
use App\Entity\Review;
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
        $volunteers = $this->getDoctrine()->getRepository(Volunteer::class)->allVolunteers();
        $structured = Utils::volunteerStructurize($volunteers, $this->getDoctrine()->getRepository(Event::class));

        return new JsonResponse(
            $structured,
            200,
            [
                'content-type' => 'application/json',
                'Access-Control-Allow-Origin'   => '*'
            ],
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
        $rawVolunteer = $this->getDoctrine()->getRepository(Volunteer::class)->findBy(['id'  => $id]);
        $rawAllReviews = $this->getDoctrine()->getRepository(Review::class)->findAll();
        $volunteer = Utils::buildSingleVolunteerStructure($rawVolunteer, $rawAllReviews, $id);

        return new JsonResponse(
            ['Volunteer' => $volunteer],
            200,
            ['content-type' => 'application/json'],
            false
        );
    }

    /**
     * @Route("api/events", name="fetchAllEvents", methods={"GET"})
     * @return JsonResponse
     */
    public function fetchAllEvents() :JsonResponse
    {
        $rawData = $this->getDoctrine()->getRepository(Event::class)->findAll();
        $events = Utils::buildEventStructure($rawData);

        return new JsonResponse(
            ['Events' => $events],
            200,
            ['content-type' => 'application/json'],
            false
        );
    }

    /**
     * @Route("api/event/{id}", name="fetchSingleEvent", methods={"GET"}, requirements={"id"="\d+"})
     * @param int $id
     * @return JsonResponse
     */
    public function fetchSingleEvent(int $id) :JsonResponse
    {
        $rawData = $this->getDoctrine()->getRepository(Event::class)->findBy(['id' => $id]);
        $event = Utils::buildEventStructure($rawData);

        return new JsonResponse(
            $event,
            200,
            ['content-type' => 'application/json'],
            false
        );
    }

    /**
     * @Route("api/organisations", name="fetchAllOrganisations", methods={"GET"})
     */
    public function fetchAllOrganisations() :JsonResponse
    {
        $rawData = $this->getDoctrine()->getRepository(Organisation::class)->findAll();
        $organisations = Utils::buildOrganisationStructure($rawData);

        return new JsonResponse(
            ['Organisations' => $organisations],
            200,
            ['content-type' => 'application/json'],
            false
        );
    }

    /**
     * @Route("api/organisation/{id}", name="fetchSingleOrganisation", methods={"GET"}, requirements={"id"="\d+"})
     * @param int $id
     * @return JsonResponse
     */
    public function fetchSingleOrganisation(int $id) :JsonResponse
    {
        $rawData = $this->getDoctrine()->getRepository(Organisation::class)->findBy(['id' => $id]);
        $organisations = Utils::buildOrganisationStructure($rawData);

        return new JsonResponse(
            $organisations,
            200,
            ['content-type' => 'application/json'],
            false
        );
    }

    /**
     * @Route("api/reviews", name="fetchAllReviews", methods={"GET"})
     * @return JsonResponse
     */
    public function fetchAllReviews() :JsonResponse
    {
        $rawData = $this->getDoctrine()->getRepository(Review::class)->findAll();
        $reviews = Utils::buildReviewStructure($rawData);

        return new JsonResponse(
            ['Reviews' => $reviews],
            200,
            ['content-type' => 'application/json'],
            false
        );
    }

    /**
     * @Route("api/review/{id}", name="fetchSingleReview", methods={"GET"}, requirements={"id"="\d+"})
     * @param int $id
     * @return JsonResponse
     */
    public function fetchSingleReview(int $id) :JsonResponse
    {
        $rawData = $this->getDoctrine()->getRepository(Review::class)->findBy(['id' => $id]);
        $review = Utils::buildReviewStructure($rawData);

        return new JsonResponse(
            $review,
            200,
            ['content-type' => 'application/json'],
            false
        );
    }
}
