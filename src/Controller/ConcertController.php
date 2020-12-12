<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\ShowConcert;
use App\Form\ConcertType;


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
     * @Route("/concerts", name="liste_concert")
     */
    public function listeConcert(): Response {

        $repository = $this->getDoctrine()->getRepository(ShowConcert::class);
        $concerts = $repository->findAll();
        return $this->render('concert/liste.html.twig', [
            'concerts' => $concerts,
        ]);
    }

    /**
     * @Route("/concert/form", name="add_concert")
     */
    public function addConcert(Request $request): Response {
        $show = new ShowConcert();
        $form = $this->createForm(ConcertType::class, $show);

        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()) {
            $show = $form->getData();

            dump($show); die;
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($show);
            $entityManager->flush();

            return $this->redirectToRoute('concert_success');
        }

        return $this->render('concert/formInsert.html.twig', [
            'form' => $form->createView(),
        ]);
    }


    /**
     * @Route("/concert/edit/{id}", name="edit_concert")
     */
    public function editConcert(Request $request, ShowConcert $concert): Response {

        $form = $this->createForm(ConcertType::class, $concert);        

        $form->handleRequest($request);
        if($form->isSubmited() && $form->isValid()) {
            $show = $form->getData();

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($concert);
            $entityManager->flush();

            $this->addFlash('success', 'Concert modifié !');
            return $this->redirectToRoute('liste_concert');
        }

        return $this->render('concert/liste.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
