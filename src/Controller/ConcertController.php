<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ConcertController extends AbstractController
{
    /**
     * @Route("/", name="")
     */
    public function index(): Response {
        return $this->render('concert/index.html.twig', [
            'controller_name' => 'Licence APIDAE',
        ]);
    }

    /**
     * @Route("/concerts", name="concert")
     */
    public function listeConcert(): Response {
        return $this->render('concert/liste.html.twig', [
                'concerts' => ['XXXTentation', 'Alpha Wann'],
        ]);
    }
}
