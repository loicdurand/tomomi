<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Doctrine\Persistence\ManagerRegistry;

use App\Entity\Article;

final class BlogController extends AbstractController
{
    private $em;
    public function __construct(ManagerRegistry $doctrine)
    {
        $this->em = $doctrine->getManager();
    }
    #[Route('/blog', name: 'app_blog')]
    public function index(): Response
    {
        $articles = $this->em->getRepository(Article::class)->findAll();

        return $this->render('blog/index.html.twig', [
            'angles' => [4, -8, -7, 11, 13, -17, 20],
            'articles' => $articles
        ]);
    }
}
