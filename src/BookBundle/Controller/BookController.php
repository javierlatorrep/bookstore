<?php

namespace BookBundle\Controller;

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
}
