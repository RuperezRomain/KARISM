<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Config\Definition\Exception\Exception;

class LoginController extends Controller
{
    
    /**
     * @Route("/login", name="login")
     */
    public function loginAction() {
    $authenticationUtils = $this->get('security.authentication_utils');

    // get the login error if there is one
    $error = $authenticationUtils->getLastAuthenticationError();

    // last username entered by the user
    $lastUsername = $authenticationUtils->getLastUsername();
    $usercourant = $this->getUser();

    return $this->render('default/login.html.twig', array(
        'last_username' => $lastUsername,
        'error'         => $error,
        'usercourant'         => $usercourant,
    ));

    }    
    
    /**
     * @Route("/logout", name="logout")
     * @throws Exception
     */
    public function logout(){
        //there is nothing here .......
    }
    
    /**
     * @Route("/loginCheck", name="loginCheck")
     * @throws Exception
     */
    public function loginCheck(){
    }
}
