<?php

namespace App\Controller;

use App\Constants\RoleConstants;
use App\Entity\Event;
use App\Entity\Organisation;
use App\Form\EventType;
use App\Interfaces\RepoInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Symfony\Component\Security\Core\Security;

/**
 * Class EventController
 * @package App\Controller
 */
class EventController extends AbstractController implements RepoInterface
{
    /**
     * @Route("/event/store/{eventId}", name="event", methods={"POST"}, requirements={"eventId"="\d+"})
     * @param Request $request
     * @param UrlGeneratorInterface $urlGenerator
     * @param Security $security
     * @param int $eventId
     * @return Response
     */
    public function store(Request $request, UrlGeneratorInterface $urlGenerator, Security $security, int $eventId = 0)
    :Response
    {
        if (!$this->isGranted(RoleConstants::ROLE_ORGANISATION)) {
            return new RedirectResponse($urlGenerator->generate('app_login'));
        }

        $em = $this->getDoctrine()->getManager();
        $event = ($eventId === 0) ? new Event() : $em->getRepository(Event::class)->find($eventId);
        if ($event === null) {
            return new Response('Neteisingas renginio ID', Response::HTTP_BAD_REQUEST);
        }

        $form = $this->createForm(EventType::class, $event);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $profileId = $security->getUser()->getProfileId();
            $organisation = $this->getDoctrine()->getRepository(Organisation::class)->find(['id' => $profileId]);
            $event->setOrganisation($organisation);
            $em->persist($event);
            $em->flush();
            return ApiController::jsonResponse($this->getRepo()->find($event->getId()));
        }
        return new Response($form->getErrors(true)[0]->getMessage(), Response::HTTP_BAD_REQUEST);
    }

    /**
     * @Route("api/events", name="fetchAllEvents", methods={"GET"})
     * @return JsonResponse
     */
    public function fetchAllEvents() :JsonResponse
    {
        return ApiController::jsonResponse($this->getRepo()->findAll());
    }

    /**
     * @Route("api/event/{id}", name="fetchSingleEvent", methods={"GET"}, requirements={"id"="\d+"})
     * @param int $id
     * @return JsonResponse
     */
    public function fetchSingleEvent(int $id) :JsonResponse
    {
        return ApiController::jsonResponse($this->getRepo()->findBy(['id' => $id]));
    }

    /**
     * @param int $start
     * @param int $count
     * @return JsonResponse
     * @Route(
     *     "/api/events/{start}/{count}", name="fetchEventRange", requirements={"start"="\d+", "count"="\d+"}
     *     )
     */
    public function fetchEventInterval(int $start, int $count) :JsonResponse
    {
        return ApiController::jsonResponse($this->getRepo()->findBy([], null, $count, $start));
    }

    /**
     * @return null|object
     */
    public function getRepo(): ?object
    {
        return $this->getDoctrine()->getManager()->getRepository(Event::class);
    }
}
