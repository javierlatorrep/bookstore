<?php

namespace BookBundle\Controller\Admin;

use BookBundle\Entity\Book;
use BookBundle\Form\Type\BookFormType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;

/**
 * @Route("/admin")
 * @Security("is_granted('ROLE_USER')")
 */
class BookAdminController extends Controller
{
    /**
     * @Route("/list", name="admin_list_books")
     */
    public function indexAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        
        $books = $em->getRepository('BookBundle:Book')->findAll();
        
        return $this->render('BookBundle::list.html.twig', [
            'books' => $books
        ]);
    }
    
    /**
     * @Route("/book/new", name="admin_new_book")
     */
    public function newAction(Request $request)
    {
        $form = $this->createForm(BookFormType::class);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $book = $form->getData();

            $em = $this->getDoctrine()->getManager();
            $em->persist($book);
            $em->flush();

            $this->addFlash(
                'success',
                sprintf('Book created by %s!', $this->getUser()->getEmail())
            );

            return $this->redirectToRoute('admin_list_books');
        }

        return $this->render('BookBundle::new.html.twig', [
            'bookForm' => $form->createView()
        ]);
    }
    
    /**
     * @Route("/book/{id}/edit", name="admin_edit_book")
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
    
    /**
     * @Route("/book/{id}", name="admin_delete_book")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Book $book)
    {
        $em = $this->getDoctrine()->getManager();
        $em->remove($book);
        $em->flush();
        
        return new Response(null, 204);
    }
}
