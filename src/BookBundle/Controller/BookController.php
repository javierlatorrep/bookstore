<?php

namespace BookBundle\Controller;

use BookBundle\Entity\Book;
use BookBundle\Form\Type\BookFormType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class BookController extends Controller
{
    /**
     * @Route("/", name="home")
     */
    public function indexAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        
        $books = $em->getRepository('BookBundle:Book')->findAll();
        
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
    
    /**
     * @Route("/book/{id}/edit", name="edit_book")
     */
    public function editAction(Request $request, Book $book)
    {
        $form = $this->createForm(BookFormType::class, $book);
        
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $book = $form->getData();

            $em = $this->getDoctrine()->getManager();
            $em->flush();

            $this->addFlash('success', 'Book updated!');

            return $this->redirectToRoute('show_book', [
                'id' => $book->getId()
            ]);
        }
        
        return $this->render('BookBundle::edit.html.twig', [
            'bookForm' => $form->createView(),
            'id' => $book->getId()
        ]);
    }   
}
