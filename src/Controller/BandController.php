<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use App\Entity\Band;
use App\Entity\ShowConcert;

class BandController extends AbstractController
{
    /**
     * @Route("/bands", name="band_list")
     */
    public function bandsAll(): Response {
        $repository = $this->getDoctrine()->getRepository(Band::class);
        $bands = $repository->findAll();
        return $this->render('band/list.html.twig', [
            'bands' => $bands,
        ]);
    }

    /**
     * @Route("/band/{id}", name="band_show")
     */
    public function list(int $id): Response {
        $repository = $this->getDoctrine()->getRepository(Band::class);
        $membres = $repository->find($id);

        $repository2 = $this->getDoctrine()->getRepository(ShowConcert::class);
        $concerts = $repository2->find($id);

        return $this->render('band/band.html.twig', [
                'band' => $membres,
                'concerts' => $concerts
            ]
        );
    }
}
