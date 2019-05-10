<?php

namespace App\Controller;

use App\Entity\Event;
use App\Entity\Job;
use App\Entity\Organisation;
use App\Entity\Review;
use App\Entity\User;
use App\Entity\Volunteer;
use App\Entity\VolunteerEvent;
use PhpParser\Node\Expr\Cast\Object_;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\AbstractNormalizer;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;

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
        return $this->jsonResponse($this->getDoctrine()->getRepository(Volunteer::class)->findAll());
    }

    /**
     * @param int $start
     * @param int $count
     * @return JsonResponse
     * @Route("/api/volunteers/{start}/{count}", name="fetchVolunteerRange", requirements={"start"="\d+", "count"="\d+"})
     */
    public function fetchVolunteerInterval(int $start, int $count)
    {
        return $this->jsonResponse($this->getDoctrine()->getRepository(Volunteer::class)->findBy([],null,$count,$start));
    }

    /**
     * @Route("api/volunteer/{id}", name="fetchSingleVolunteer", methods={"GET"}, requirements={"id"="\d+"})
     * @param int $id
     * @return JsonResponse
     */
    public function fetchSingleVolunteer(int $id):JsonResponse
    {
        return $this->jsonResponse($this->getDoctrine()->getRepository(Volunteer::class)->findBy(['id' => $id]));
    }

    /**
     * @param int $userId
     * @return JsonResponse
     * @Route("/api/user/volunteer/{userId}", name="fetchSingleVolunteerByUserId", methods={"GET"}, requirements={"userId"="\d+"})
     */
    public function fetchSingleVolunteerByUserId(int $userId) :JsonResponse
    {
        return $this->jsonResponse($this->getDoctrine()->getRepository(Volunteer::class)->findBy(['user_id' => $userId]));
    }


    /**
     * @Route("/api/volunteers/filter/job-type/{type}", name="fetchVolunteerByJobType", methods={"GET"}, requirements={"type"="[a-zA-Z]+"})
     * @param string $type
     * @return JsonResponse
     */
    public function volunteerFilterByJobType(string $type = '') : JsonResponse
    {
        return $this->jsonResponse($this->getDoctrine()->getRepository(Job::class)->findBy(['job_type' => $type]));
    }

    /**
     * @Route("/api/volunteers/filter/rating")
     */
    public function volunteerFilterByReviewRating() :JsonResponse
    {
        return $this->jsonResponse($this->getDoctrine()->getRepository(Review::class)->filterByRating());
    }

    /**
     * @return JsonResponse
     * @Route("/api/volunteers/filter/event-count")
     */
    public function volunteerFilterByAttendanceCount() :JsonResponse
    {
        return $this->jsonResponse($this->getDoctrine()->getRepository(Volunteer::class)->filterByEventTotalCount());
    }

    /**
     * @Route("api/events", name="fetchAllEvents", methods={"GET"})
     * @return JsonResponse
     */
    public function fetchAllEvents() :JsonResponse
    {
        return $this->jsonResponse($this->getDoctrine()->getRepository(Event::class)->findAll());
    }

    /**
     * @Route("api/event/{id}", name="fetchSingleEvent", methods={"GET"}, requirements={"id"="\d+"})
     * @param int $id
     * @return JsonResponse
     */
    public function fetchSingleEvent(int $id) :JsonResponse
    {
        return $this->jsonResponse($this->getDoctrine()->getRepository(Event::class)->findBy(['id' => $id]));
    }

    /**
     * @Route("api/organisations", name="fetchAllOrganisations", methods={"GET"})
     */
    public function fetchAllOrganisations() :JsonResponse
    {
        return $this->jsonResponse($this->getDoctrine()->getRepository(Organisation::class)->findAll());
    }

    /**
     * @Route("api/organisation/{id}", name="fetchSingleOrganisation", methods={"GET"}, requirements={"id"="\d+"})
     * @param int $id
     * @return JsonResponse
     */
    public function fetchSingleOrganisation(int $id) :JsonResponse
    {
        return $this->jsonResponse($this->getDoctrine()->getRepository(Organisation::class)->findBy(['id' => $id]));
    }

    /**
     * @param int $userId
     * @return JsonResponse
     * @Route("/api/user/organisation/{userId}", name="fetchSingleOrganisationByUserId", methods={"GET"}, requirements={"userId"="\d+"})
     */
    public function fetchSingleOrganisationByUserId(int $userId) :JsonResponse
    {
        return $this->jsonResponse($this->getDoctrine()->getRepository(Organisation::class)->findBy(['user_id' => $userId]));
    }

    /**
     * @Route("api/reviews", name="fetchAllReviews", methods={"GET"})
     * @return JsonResponse
     */
    public function fetchAllReviews() :JsonResponse
    {
        return $this->jsonResponse($this->getDoctrine()->getRepository(Review::class)->findAll());
    }

    /**
     * @Route("api/review/{id}", name="fetchSingleReview", methods={"GET"}, requirements={"id"="\d+"})
     * @param int $id
     * @return JsonResponse
     */
    public function fetchSingleReview(int $id) :JsonResponse
    {
        return $this->jsonResponse($this->getDoctrine()->getRepository(Review::class)->findBy(['id' => $id]));
    }

    /**
     * @return Serializer
     */
    private function getSerializer() :Serializer
    {
        $encoder = new JsonEncoder();
        $defaultContext = [
            AbstractNormalizer::CIRCULAR_REFERENCE_HANDLER => function ($object, $format, $context) {
                return $object->getId();
            },
        ];
        $normalizer = new ObjectNormalizer(null, null, null, null, null, null, $defaultContext);

        $serializer = new Serializer([$normalizer], [$encoder]);
        return $serializer;
    }


    /**
     * @param array $toSerialize
     * @return JsonResponse
     */
    private function jsonResponse( $toSerialize) :JsonResponse
    {
        $serialized = $this->getSerializer()->serialize($toSerialize, 'json');

        return $this->response(
            $serialized
        );
    }

    /**
     * @param array $data
     * @param int $code
     * @param array|null $headers
     * @return JsonResponse
     */
    private function response(string $data, int $code = 200, array $headers = []) : JsonResponse
    {
        if ($headers === []) {
            $headers = $this->defaultHeader();
        }

        return JsonResponse::fromJsonString(
            $data,
            $code,
            $headers
        );
    }

    /**
     * @return array
     */
    private function defaultHeader() :array
    {
        return [
            'content-type' => 'application/json',
            'Access-Control-Allow-Origin'   => '*'
        ];
    }
}
