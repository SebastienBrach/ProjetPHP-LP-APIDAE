<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class BandController extends AbstractController
{
    /**
     * @Route("/bands", name="band_list")
     */
    public function bandsAll(): Response {
        $repository = $this->getDoctrine()->getRepository(Band::class);
        $bands = $repository->findAll();
        return $this->render('band/list.html.twig', [
            'band' => $bands,
        ]);
    }

    /**
     * @Route("/bands/{id}", name="band_show")
     */
    public function listeConcert(): Response {
        return $this->render('concert/liste.html.twig', [
                'concerts' => ['XXXTentation', 'Alpha Wann'],
        ]);
    }
}
