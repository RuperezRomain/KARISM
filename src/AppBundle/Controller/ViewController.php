<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ViewController extends Controller
{
    /**
     * @Route("/accueil", name="accueilTest")
     */
    public function accueilAction() {
        
        return $this->render('default/accueil.html.twig');
    }
        /**
     * @Route("/login", name="loginTest")
     */
    public function loginAction() {
        
        return $this->render('default/login.html.twig');
    }
            /**
     * @Route("/charte", name="charteTest")
     */
    public function charteAction() {
        
        return $this->render('default/charte.html.twig');
    }
            /**
     * @Route("/interrogation", name="interrogationTest")
     */
    public function interrogationAction() {
        
        return $this->render('default/interrogation.html.twig');
    }
}