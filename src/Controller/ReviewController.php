<?php

namespace App\Controller;

use App\Entity\Review;
use App\Interfaces\RepoInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class ReviewController
 * @package App\Controller
 */
class ReviewController extends AbstractController implements RepoInterface
{
    /**
     * @Route("api/review/{id}", name="fetchSingleReview", methods={"GET"}, requirements={"id"="\d+"})
     * @param int $id
     * @return JsonResponse
     */
    public function fetchSingleReview(int $id) :JsonResponse
    {
        return ApiController::jsonResponse($this->getRepo()->findBy(['id' => $id]));
    }

    /**
     * @Route("api/reviews", name="fetchAllReviews", methods={"GET"})
     * @return JsonResponse
     */
    public function fetchAllReviews() :JsonResponse
    {
        return ApiController::jsonResponse($this->getRepo()->findAll());
    }

    /**
     * @Route("/api/volunteers/filter/rating", name="filterVolunteersByRating", methods={"GET"})
     */
    public function volunteerFilterByReviewRating() :JsonResponse
    {
        return ApiController::jsonResponse($this->getRepo()->filterByRating());
    }

    /**
     * @return null|object
     */
    public function getRepo(): ?object
    {
        return $this->getDoctrine()->getManager()->getRepository(Review::class);
    }
}
