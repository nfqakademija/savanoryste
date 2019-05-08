<?php

namespace App\Controller;

use App\Entity\Event;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class EventController
 * @package App\Controller
 */
class EventController extends AbstractController
{

    /**
     * @Route("/event/new", name="event")
     * @param Request $request
     * @return Response
     */
    public function new(Request $request) :Response
    {
        $event = new Event();

        if($this->areFieldsEmpty($request)){
            return $this->respond(Response::HTTP_TEMPORARY_REDIRECT);
        }

        $event->setTitle($this->sanitizeInput($request->request->get('title')));
        $event->setDescription($this->sanitizeInput($request->request->get('description')));
        $event->setStartDate(new \DateTime($this->sanitizeInput($request->request->get('startDate'))));
        $event->setEndDate(new \DateTime($this->sanitizeInput($request->request->get('endDate'))));
        $event->setOrganisation(null);

        $em = $this->getDoctrine()->getManager();
        $em->persist($event);
        $em->flush();

        return $this->respond(Response::HTTP_OK);
    }

    /**
     * @param int $status
     * @return Response
     */
    private function respond(int $status) :Response
    {
        $response = new Response();
        $response->setStatusCode($status);
        $response->headers->set('Location', '/event');
        return $response->send();
    }

    /**
     * @param string $inputValue
     * @return string
     */
    private function sanitizeInput(string $inputValue) :string
    {
        return htmlspecialchars($inputValue, ENT_QUOTES, 'UTF-8');
    }


    /**
     * @param Request $request
     * @return bool
     */
    private function areFieldsEmpty(Request $request): bool
    {
        $fields = $request->request;
        switch ($request->request){
            case empty($fields->get('title')):
                return true;
            case empty($fields->get('description')):
                return true;
            case empty($fields->get('startDate')):
                return true;
            case empty($fields->get('endDate')):
                return true;
            default:
                return false;
        }
    }
}
