<?php

namespace App\Controller;

use App\Entity\Event;
use App\Form\EventType;
use App\Interfaces\RepoInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class EventController
 * @package App\Controller
 */
class EventController extends AbstractController implements RepoInterface
{

    private $timeZoneLT;

    public function __construct()
    {
        $this->timeZoneLT = new \DateTimeZone('Europe/Vilnius');
    }

    /**
     * @Route("/event/store/{eventId}", name="event", methods={"POST"}, requirements={"eventId"="\d+"})
     * @param Request $request
     * @param int $eventId
     * @return Response
     */
    public function store(Request $request, int $eventId = 0) :Response
    {
        $em = $this->getDoctrine()->getManager();
        $event = ($eventId === 0) ? new Event() : $em->getRepository(Event::class)->find($eventId);
        if($event === NULL){
            return new Response('Neteisingas renginio ID', Response::HTTP_BAD_REQUEST);
        }
        $form = $this->createForm(EventType::class, $event);

        $event->setStartDate(
            new \DateTime($request->request->get('event')['start_date'],$this->timeZoneLT)
        );
        $event->setEndDate(
            new \DateTime($request->request->get('event')['end_date'], $this->timeZoneLT)
        );

        $form->handleRequest($request);
       // dd($event);
        if($form->isSubmitted() && $form->isValid()){

            $em->persist($event);
            $em->flush();
            return new Response(Response::HTTP_OK);
        }
       // dd($form->getErrors(true)[0]->getMessage());
        return new Response(Response::HTTP_BAD_REQUEST);
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
     * @return null|object
     */
    public function getRepo(): ?object
    {
        return $this->getDoctrine()->getManager()->getRepository(Event::class);
    }
}
