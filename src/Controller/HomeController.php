<?php

namespace App\Controller;

use App\Entity\Event;
use App\Entity\Volunteer;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class HomeController
 * @package App\Controller
 */
class HomeController extends AbstractController
{
    /**
     * @Route(
     * "/{reactRouting}",
     * name="index",
     * requirements=
     * {
     *      "reactRouting"="^(?!api|login|register|logout|invite|profile/update|organisation/store|admin).+"
     * },
     * defaults={"reactRouting": null})
     * @param EntityManager $em
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function index(EntityManagerInterface $em)
    {
        return $this->render('home/index.html.twig', [
            'eventCount'        => $em->getRepository(Event::class)->getEventCount(),
            'participantCount'  => $em->getRepository(Volunteer::class)->getParticipantCount()
        ]);
    }
}
