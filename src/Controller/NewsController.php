<?php

namespace App\Controller;

use App\Entity\News;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class NewsController extends AbstractController
{
    /**
     * @Route("/news", name="news")
     */
    public function index()
    {
        return $this->render('news/index.html.twig', [
            'controller_name' => 'NewsController',
        ]);
    }

    /**
     * @Route("/product", name="create_product")
     */
    public function createProduct(): Response
    {
        // you can fetch the EntityManager via $this->getDoctrine()
        // or you can add an argument to the action: createProduct(EntityManagerInterface $entityManager)
        $entityManager = $this->getDoctrine()->getManager();

        $news = new News();
        $news->setTitle("Títol de prova");
        $news->setContent("Descripció de prova");
        $news->setImage("test.jpg");

        // tell Doctrine you want to (eventually) save the Product (no queries yet)
        $entityManager->persist($news);

        // actually executes the queries (i.e. the INSERT query)
        $entityManager->flush();

        return new Response('Saved new news with id '.$news->getId());
    }

    /**
     * @Route("/product/{id}", name="product_show")
     */
    public function show($id)
    {
        $news = $this->getDoctrine()
            ->getRepository(News::class)
            ->find($id);

        if (!$news) {
            throw $this->createNotFoundException(
                'No news found for id '.$id
            );
        }

        return new Response('Check out this great news: '.$news->getTitle());
    }
}
