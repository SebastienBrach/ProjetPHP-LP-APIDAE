<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use App\Entity\Band;
use App\Entity\ShowConcert;
use App\Form\BandType;


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
        // $concerts = $repository2->findOneBy(['band' => $id]);  // ne fonctionne pas (err : out of memory (je dois load bcp de data mais je ne vois pas pourquoi))
        $concerts = $repository2->findAll();

        return $this->render('band/band.html.twig', [
                'band' => $membres,
                'concerts' => $concerts
            ]
        );
    }


    /**
     * @Route("/bands/form", name="add_band")
     * @isGranted("ROLE_ADMIN")
     */
    public function addBand(Request $request): Response {
        $show = new Band();
        $form = $this->createForm(BandType::class, $show);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()) {
            $show = $form->getData();
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($show);
            $entityManager->flush();

            $this->addFlash('success', 'Groupe ajouté avec succés !');
            return $this->redirectToRoute('band_list');
        }   

        return $this->render('band/formInsert.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
