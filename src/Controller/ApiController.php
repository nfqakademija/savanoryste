<?php

namespace App\Controller;

use App\Entity\Event;
use App\Entity\Organisation;
use App\Entity\Review;
use App\Entity\Volunteer;
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
        $volunteers = $this->getDoctrine()->getRepository(Volunteer::class)->findAll();
        $serialized = $this->getSerializer()->serialize($volunteers, 'json');

        return $this->Response(
              $serialized
        );
    }

    /**
     * @Route("api/volunteer/{id}", name="fetchSingleVolunteer", methods={"GET"}, requirements={"id"="\d+"})
     * @param int $id
     * @return JsonResponse
     */
    public function fetchSingleVolunteer(int $id):JsonResponse
    {
        $volunteer = $this->getDoctrine()->getRepository(Volunteer::class)->find($id);
        $serialized = $this->getSerializer()->serialize($volunteer, 'json');

        return $this->Response(
            $serialized
        );
    }

    /**
     * @Route("api/events", name="fetchAllEvents", methods={"GET"})
     * @return JsonResponse
     */
    public function fetchAllEvents() :JsonResponse
    {
        $events = $this->getDoctrine()->getRepository(Event::class)->findAll();
        $serialized = $this->getSerializer()->serialize($events, 'json');

        return $this->Response(
            $serialized
        );
    }

    /**
     * @Route("api/event/{id}", name="fetchSingleEvent", methods={"GET"}, requirements={"id"="\d+"})
     * @param int $id
     * @return JsonResponse
     */
    public function fetchSingleEvent(int $id) :JsonResponse
    {
        $event = $this->getDoctrine()->getRepository(Event::class)->find($id);
        $serialized = $this->getSerializer()->serialize($event, 'json');

        return $this->Response(
            $serialized
        );
    }

    /**
     * @Route("api/organisations", name="fetchAllOrganisations", methods={"GET"})
     */
    public function fetchAllOrganisations() :JsonResponse
    {
        $organisations = $this->getDoctrine()->getRepository(Organisation::class)->findAll();
        $serialized = $this->getSerializer()->serialize($organisations, 'json');

        return $this->Response(
            $serialized
        );
    }

    /**
     * @Route("api/organisation/{id}", name="fetchSingleOrganisation", methods={"GET"}, requirements={"id"="\d+"})
     * @param int $id
     * @return JsonResponse
     */
    public function fetchSingleOrganisation(int $id) :JsonResponse
    {
        $organisation = $this->getDoctrine()->getRepository(Organisation::class)->find($id);
        $serialized = $this->getSerializer()->serialize($organisation, 'json');

        return $this->Response(
            $serialized
        );
    }

    /**
     * @Route("api/reviews", name="fetchAllReviews", methods={"GET"})
     * @return JsonResponse
     */
    public function fetchAllReviews() :JsonResponse
    {
        $reviews = $this->getDoctrine()->getRepository(Review::class)->findAll();
        $serialized = $this->getSerializer()->serialize($reviews, 'json');

        return $this->Response(
            $serialized
        );
    }

    /**
     * @Route("api/review/{id}", name="fetchSingleReview", methods={"GET"}, requirements={"id"="\d+"})
     * @param int $id
     * @return JsonResponse
     */
    public function fetchSingleReview(int $id) :JsonResponse
    {
        $review = $this->getDoctrine()->getRepository(Organisation::class)->find($id);
        $serialized = $this->getSerializer()->serialize($review, 'json');

        return $this->Response(
            $serialized
        );
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
     * @param array $data
     * @param int $code
     * @param array|null $headers
     * @return JsonResponse
     */
    private function Response(string $data, int $code = 200, array $headers = [] ) : JsonResponse
    {
        if($headers === []){
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
