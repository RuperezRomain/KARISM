<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Exposition;
use AppBundle\Entity\User;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ViewController extends Controller {

    /**
     * @Route("/accueil", name="accueilTest")
     */
    public function accueilAction() {

        $em = $this->getDoctrine()->getManager();
        $exposRender = array();
        $artistesRender = array();


        $expos = $em->getRepository(Exposition::class)->findByStatus(2);
        
        shuffle($expos);
        if (count($expos) >= 8) {
            for ($i = 0; $i < 8; $i++) {
                array_push($exposRender, $expos[$i]);
            }
        } else {
            $exposRender = $expos ;
        }
        
        $artistes = $em->getRepository(User::class)->findBy(array('artistValidate' => 1));
        
        shuffle($artistes);
        if (count($artistes) >= 8) {
            for ($i = 0; $i < 8; $i++) {
                array_push($artistesRender, $artistes[$i]);
            }
        } else {
            $artistesRender = $artistes ;
        }
        return $this->render("default/accueil.html.twig", array('listeExpos' => $exposRender,'listeArtistes'=>$artistesRender));
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
     * 
     * @Route("/recherche", name="rechercheTest")
     */
    public function rechercheAction() {

        return $this->render('default/recherche.html.twig');
    }

    /**
     * @Route("/profil", name="profilTest")
     */
    public function profilAction() {

        return $this->render('default/profil.html.twig');
    }

    /**
     * @Route("/admin", name="admin")
     */
    public function adminHome() {

        return $this->render('admin/adminHome.html.twig');
    }

    /**
     * @Route("/admin/list/series", name="adminListSeries")
     */
    public function adminListSeries() {

        return $this->render('admin/listSeries.html.twig');
    }

    /**
     * @Route("/admin/list/places", name="adminListPlaces")
     */
    public function adminListPlaces() {

        return $this->render('admin/listPlaces.html.twig');
    }

    /**
     * @Route("/admin/list/users", name="adminListUsers")
     */
    public function adminListUsers() {

        return $this->render('admin/listUsers.html.twig');
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
