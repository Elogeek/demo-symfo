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

        $articles = [
            new ArticleController(),
            new ArticleController(),
            new ArticleController(),
        ];

        return $this->render('article/list.html.twig', ['articles' => $articles]);

    }

    /**
     * Return a single article
     */
    #[Route('/show/{articleId<\d+>}', name: 'show', methods: ['GET'])]
    public function show(int $articleId): Response {
        $articles = [
            new ArticleController()
        ];

        return $this->render('article/single.html.twig', ['articles' => $articles]);

    }

    /**
     * Edit a single article
     */
     #[Route('/edit/{articleID<\d+>}', name: 'edit', methods: ['GET', 'POST'])]
    public function edit(int $articleID): Response {
       $articles = [
           new ArticleController()
       ];

      /**
       * If not admin === redirectTO home article (articles_list)

       if(!in_array('ROLE_AUTHOR', $this->getUser()->getRoles())) {
           return $this->redirectToRoute('articles_list');
       }
       */
       return $this->render('article/edit.html.twig', ['articles' => $articles]);
     }

     /**
      * Delete a single article
      */
      #[Route('/delete/{id<\d+>}', name: 'delete', methods: ['GET', 'DELETE'])]
      public function delete(int $id): Response {
          $articles = [
              new ArticleController()
          ];

          return $this->render('article/delete.html.twig', ['articles' => $articles]);
      }

}