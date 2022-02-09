<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/articles', name: 'articles_')]

class ArticleController extends AbstractController {

    #[Route('/', name: 'list', methods: ['GET'])]
    /**
     * Return all articles
     */
    public function list(): Response {
        return $this->render('article/list.html.twig');
    }

    /**
     * Return a single article
     */
    #[Route('/show/{articleId<\d+>}', name: 'show', methods: ['GET'])]
    public function show(int $articleId): Response {
        return $this->render('article/single.html.twig', ['articleId' => $articleId]);
    }

    /**
     * Edit a single article
     */
    #[Route('/edit/{articleID<\d+>}', name: 'edit', methods: ['GET', 'POST'])]
    public function edit(int $articleID): Response {

      /**
       * If not admin === redirectTO home article (articles_list)

       if(!in_array('ROLE_AUTHOR', $this->getUser()->getRoles())) {
           return $this->redirectToRoute('articles_list');
       }
       */
       return $this->render('article/edit.html.twig', ['articleID' => $articleID]);
    }

    /**
     * Delete a single article
     */
    #[Route('/delete/{id<\d+>}', name: 'delete', methods: ['GET', 'DELETE'])]
    public function delete(int $id): Response {
        return $this->render('article/delete.html.twig', ['id' => $id]);
    }

}