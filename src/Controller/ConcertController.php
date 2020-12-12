<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\ShowConcert;

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

        $repository = $this->getDoctrine()->getRepository(ShowConcert::class);
        $concerts = $repository->findAll();
        return $this->render('concert/liste.html.twig', [
            'concerts' => $concerts,
        ]);
    }

    /**
     * @Route("/concert/form", name="form")
     */
    public function addConcert(): Response {
        $form = $this->createForm(ShowConcert::class);        

        return $this->render('concert/formInsert.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
