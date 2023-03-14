<?php

namespace App\Controller;

use App\Repository\JeuxRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/articles', name: 'articles_')]
class ArticlesController extends AbstractController
{
    #[Route('/', name: 'index')]
    public function index(JeuxRepository $JeuxRepository): Response
    {
        $jeux = $JeuxRepository->findAll();
        dd($jeux);
        return $this->render('articles/index.html.twig', [
            'controller_name' => 'ArticlesController',
        ]);
    }

    #[Route('/article/{id}', name: 'article')]
    public function showArticle(JeuxRepository $JeuxRepository, $id): Response
    {
        $jeu = $JeuxRepository->findBy(array('id' => $id));
        dd($jeu);
        if (!$jeu) {
            throw $this->createNotFoundException('Jeux non trouvé');
        }
        return $this->render('articles/article.html.twig', [
            'controller_name' => 'ArticlesController',
        ]);
    }
}
