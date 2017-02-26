<?php

namespace BookBundle\Controller\Admin;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;

/**
 * @Route("/admin")
 * @Security("is_granted('ROLE_USER')")
 */
class BookAdminController extends Controller
{
    /**
     * @Route("/list", name="admin_books_list")
     */
    public function indexAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        
        $books = $em->getRepository('BookBundle:Book')->findAll();
        
        return $this->render('BookBundle::list.html.twig', [
            'books' => $books
        ]);
    }   
}
