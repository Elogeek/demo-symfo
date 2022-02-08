<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/users', name: 'users_')]

class UserController extends AbstractController {

    /**
     * Return all users
     */
    #[Route('/', name: 'list', methods: ['GET'])]
    public function list(): Response {

            $users = [
                new UserController(),
                new UserController(),
                new UserController(),
                new UserController()
            ];

            return $this->render('user/list.html.twig', ['users' => $users]);
    }

    #[Route('/edit/{userID<\d+>}', name: 'edit', methods: ['GET', 'POST'])]
    public function edit(int $userID): Response {

    }

    #[Route('/delete/{userId<\d+>}', name: 'delete', methods: ['GET', 'DELETE'])]
    public function delete(int $userId): Response {
    }


}