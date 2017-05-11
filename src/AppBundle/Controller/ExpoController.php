<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Exposition;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 *
 * 
 */
class ExpoController extends Controller {

    ///Initialisation formEvent 
    /**
     * @Route("user/create/expo")
     */
    public function infoExpo(Request $request) {
        $em = $this->getDoctrine()->getManager();
        
        $expo = new Exposition;
        
        $f = $this->createForm('AppBundle\Form\ExpositionType',$expo);
        // et on retourne le formulaire dans notre vue
        $f->handleRequest($request);
        if ($f->isSubmitted() && $f->isValid()) {
            
            $this->get('session')->remove('expoSession');
            $this->get('session')->set('expoSession', $expo);
           
            $em->persist($expo);
            $em->flush($expo);
            
            return $this->redirect($this->generateUrl('expoSerie'));
          }       
        
        return $this->render("expo/infoExpo.html.twig", array("formInfoExpo" => $f->createView()));
    }
    
    /// Vue des serie de l'expo
    /**
     * @Route("get/expo/serie",name="expoSerie")
     */
    public function getExpoSerie() {
         $expo = $this->getDoctrine()->getRepository(Exposition::class)->find($this->get('session')->get('expoSession')->getId());
         $expoListeSerie = $expo->getFkserie();
         return $this->render("expo/gestionSeriesExpo.html.twig",array("listesSerieExpo" => $expoListeSerie));
    }
    
    
    /// Selection oeuvres
    /**
     * @Route("edit/expo/serie")
     */
    public function updateExpoSerie(Request $request) {
        
        ////Recupertion ajax
        
        ////creation tbl d'object serie 
        
       ////mergage avec la serie sous session
        
       ///svg 
        
       ///redirection liste hote 
    }
    


    /// trouver hote 
    /**
     * @Route("")
     */
    public function updateExpoLieux() {
        
    }

    // validation expo
    /**
     * @Route("")
     */
    public function updateExpoStatueValidate() {
        
    }

}
