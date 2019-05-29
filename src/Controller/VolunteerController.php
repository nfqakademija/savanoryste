<?php

namespace App\Controller;

use App\Constants\RoleConstants;
use App\Entity\User;
use App\Entity\Volunteer;
use App\Form\VolunteerProfileType;
use App\Interfaces\RepoInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class VolunteerController
 * @package App\Controller
 */
class VolunteerController extends AbstractController implements RepoInterface
{
    /**
     * @Route("/profile/update/{volunteerId}", methods={"POST", "GET"}, requirements={"volunteerId"="\d+"})
     * @param Request $request
     * @param int $volunteerId
     * @return Response
     */
    public function update(Request $request, int $volunteerId) :Response
    {
        //dd($request);
        $em = $this->getDoctrine()->getManager();

        $volunteer = $em->getRepository(Volunteer::class)->find($volunteerId);
        if ($volunteer === null) {
            return new Response('Tokio savanorio profilio nera!', Response::HTTP_BAD_REQUEST);
        }

        $form = $this->createForm(VolunteerProfileType::class, $volunteer);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em->persist($volunteer);
            $em->flush();
            return new Response(Response::HTTP_OK);
        }

        return new Response($form->getErrors(true)[0]->getMessage(), Response::HTTP_BAD_REQUEST);
    }

    /**
     * @Route("/api/volunteers", name="fetchAllVolunteers", methods={"GET"})
     * @return JsonResponse
     */
    public function fetchAllVolunteers() :JsonResponse
    {
        return ApiController::jsonResponse($this->getRepo()->findAll());
    }

    /**
     * @param int $start
     * @param int $count
     * @return JsonResponse
     * @Route(
     *     "/api/volunteers/{start}/{count}", name="fetchVolunteerRange", requirements={"start"="\d+", "count"="\d+"}
     *     )
     */
    public function fetchVolunteerInterval(int $start, int $count) :JsonResponse
    {
        return ApiController::jsonResponse($this->getRepo()->findBy([], null, $count, $start));
    }

    /**
     * @Route("api/volunteer/{id}", name="fetchSingleVolunteer", methods={"GET"}, requirements={"id"="\d+"})
     * @param int $id
     * @return JsonResponse
     */
    public function fetchSingleVolunteer(int $id):JsonResponse
    {
        return ApiController::jsonResponse($this->getRepo()->findBy(['id' => $id]));
    }

    /**
     * @return JsonResponse
     * @Route("/api/volunteers/filter/event-count", name="fetchVolunteersByEventCount", methods={"GET"})
     */
    public function volunteerFilterByAttendanceCount() :JsonResponse
    {
        return ApiController::jsonResponse($this->getRepo()->filterByEventTotalCount());
    }

    /**
     * @param int $userId
     * @return JsonResponse
     * @Route("/api/user/volunteer/{userId}", name="fetchSingleVolunteerByUserId", methods={"GET"}, requirements={"userId"="\d+"})
     */
    public function fetchSingleVolunteerByUserId(int $userId) :JsonResponse
    {
        // TODO Refactor this mess
        $user =  $this->getDoctrine()->getRepository(User::class)->find(['id' => $userId]);
        if ($user === null){
            return ApiController::jsonResponse(NULL);
        }
        if (in_array(RoleConstants::ROLE_VOLUNTEER,$user->getRoles())){
            return ApiController::jsonResponse(
                $this->getDoctrine()->getRepository(User::class)->getVolunteerProfile($user->getProfileId())
            );
        }
        return ApiController::jsonResponse(NULL);
    }

    /**
     * @return null|object
     */
    public function getRepo(): ?object
    {
        return $this->getDoctrine()->getManager()->getRepository(Volunteer::class);
    }
}
