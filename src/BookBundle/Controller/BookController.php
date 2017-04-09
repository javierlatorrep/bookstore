<?php

namespace BookBundle\Controller;

use BookBundle\Entity\Book;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class BookController extends Controller
{
    /**
     * @Route("/", name="home")
     */
    public function indexAction()
    {
        $entityManager = $this->getDoctrine()->getManager();
        
        $books = $entityManager->getRepository('BookBundle:Book')->findAll();
        
        return $this->render('BookBundle::home.html.twig', [
            'books' => $books
        ]);
    }
    
    /**
     * @Route("/book/{id}", name="show_book")
     */
    public function showAction(Book $book)
    {
        return $this->render('BookBundle::show.html.twig', [
            'book' => $book
        ]);
    }   
}
