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

        return $this->render('member/list.html.twig', [
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
        $band = new Band();
        $form = $this->createForm(BandType::class, $band);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()) {
            // $photo = $form->get('picture')->getData();
            // if ($photo) {
            //     $originalFilename = pathinfo($photo->getClientOriginalName(), PATHINFO_FILENAME);
            //     $safeFilename = $slugger->slug($originalFilename);
            //     $newFilename = $safeFilename.'-'.uniqid().'.'.$photo->guessExtension();
            //     try {
            //         $photo->move($this->getParameter('images/'), $newFilename);
            //     } catch (FileException $e) {
            //         // ... handle exception if something happens during file upload
            //     }
            //     $product->setPicture($newFilename);
            // }

            $band = $form->getData();
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($band);
            $entityManager->flush();

            $this->addFlash('success', 'Groupe ajouté avec succés !');
            return $this->redirectToRoute('band_list');
        }   

        return $this->render('band/formInsert.html.twig', [
            'form' => $form->createView(),
        ]);
    }


    /**
     * @Route("/bands/edit/{id}", name="edit_band")
     * @isGranted("ROLE_ADMIN")
     */
    public function editConcert(Request $request, Band $concert): Response {
        $form = $this->createForm(BandType::class, $concert);        
        $form->handleRequest($request);
        
        if($form->isSubmitted() && $form->isValid()) {
            $band = $form->getData();

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($concert);
            $entityManager->flush();

            $this->addFlash('success', 'Groupe modifié !');
            return $this->redirectToRoute('band_list');
        }

        return $this->render('band/formInsert.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/bands/delete/{id}", name="delete_band")
     * @isGranted("ROLE_ADMIN")
     */
    public function deleteConcert(Request $request, Band $concert): Response {
        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->remove($concert);
        $entityManager->flush();

        $this->addFlash('success', 'Groupe supprimé !');
        return $this->redirectToRoute('band_list');
    }
}
