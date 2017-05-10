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
           
            $em->persist($expo);
            $em->flush($expo);
            
        return $this->render("expo/infoExpo.html.twig", array("formInfoExpo" => $f->createView()));
        }
        
        return $this->render("expo/infoExpo.html.twig", array("formInfoExpo" => $f->createView()));
    }

    /// Selection oeuvres
    /**
     * @Route("")
     */
    public function updateExpoSerie() {
        
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
