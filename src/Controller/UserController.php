<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\User;


class UserController extends AbstractController
{
    /**
     * @Route("/account", name="account_user")
     */
    public function checkAccount(): Response {
        $repository = $this->getDoctrine()->getRepository(User::class);
        $account = $repository->findAll();
        return $this->render('user/account.html.twig', [
            'accounts' => $account,
        ]);
    }
}
