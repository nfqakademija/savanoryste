<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class HomeController
 * @package App\Controller
 */
class HomeController extends AbstractController
{
    /**
    @Route("/{reactRouting}", name="index", requirements={"reactRouting"="^(?!api|login|register|logout).+"}, defaults={"reactRouting": null})
     */
    public function index()
    {
        return $this->render('home/index.html.twig', []);
    }
}
