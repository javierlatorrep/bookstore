<?php

namespace UserBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use UserBundle\Form\Type\LoginFormType;

class SecurityController extends Controller
{
    /**
     * @Route("/login", name="security_login")
     */
    public function loginAction()
    {
        $authenticationUtils = $this->get('security.authentication_utils');
        $error = $authenticationUtils->getLastAuthenticationError();
        $lastUsername = $authenticationUtils->getLastUsername();

        $form = $this->createForm(LoginFormType::class, [
            '_username' => $lastUsername,
        ]);
        
        return $this->render(
            'UserBundle::security/login.html.twig',
            array(
                'form'  => $form->createView(),
                'error' => $error,
            )
        );
    }
    
    /**
     * @Route("/logout", name="security_logout")
     */
    public function logoutAction()
    {
    }
}
