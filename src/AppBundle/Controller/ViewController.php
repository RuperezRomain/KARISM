<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ViewController extends Controller {

    /**
     * @Route("/accueil", name="accueilTest")
     */
    public function accueilAction() {

        return $this->render('default/accueil.html.twig');
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

        /**
     * @Route("/profil", name="profilTest")
     */
    public function profilAction() {

        return $this->render('default/profil.html.twig');
    }
    
        /**
     * @Route("/listeartiste", name="listeartisteTest")
     */
    public function listeartisteAction() {

        return $this->render('default/listeArtiste.html.twig');
    }
        /**
     * @Route("/testAfficherArtiste", name="listeartisteTestsdfsd")
     */
    public function artisteAction() {

        return $this->render('default/testAfficherArtiste.html.twig');
    }
}
