<?php

namespace App\Controller;

use App\Entity\Job;
use App\Interfaces\RepoInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class JobController
 * @package App\Controller
 */
class JobController extends AbstractController implements RepoInterface
{

    /**
     * @Route("/api/volunteers/filter/job-type/{type}", name="fetchVolunteerByJobType", methods={"GET"})
     * @param string $type
     * @return JsonResponse
     */
    public function volunteerFilterByJobType(string $type = '') : JsonResponse
    {
        return ApiController::jsonResponse($this->getRepo()->filterByJobType(urldecode($type)));
    }

    /**
     * @return null|object
     */
    public function getRepo(): ?object
    {
        return $this->getDoctrine()->getManager()->getRepository(Job::class);
    }
}
