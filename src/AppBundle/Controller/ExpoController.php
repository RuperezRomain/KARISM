<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Exposition;
use AppBundle\Entity\Serie;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
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

        $f = $this->createForm('AppBundle\Form\ExpositionType', $expo);
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
        return $this->render("expo/gestionSeriesExpo.html.twig", array("listesSerieExpo" => $expoListeSerie));
    }

    ////////////// Selection oeuvres
    
    
    /**
     * Ajout de serie a l'exposition sous session 
     * @Route("/edit/expo/serie")
     */
    public function updateExpoSerie(Request $request) {
        $em = $this->getDoctrine()->getManager();
        $listeSeries = array();
        ////Recupertion ajax
        $idSerie = $request->get('listeId');
        ////creation tbl d'object serie 
        for ($i = 0; $i < count($idSerie); $i++) {
            $serieDefault = $em->getRepository(Serie::class)->find($idSerie[$i]);
            array_push($listeSeries, $serieDefault);
        }
        ////mergage avec la serie sous session
        $idExpo = $this->get('session')->get('expoSession')->getId();
        $ExpoDefault = $em->getRepository(Exposition::class)->find($idExpo);
        
        
        
        $listeSerieExpo = $ExpoDefault->getFkserie();
        
        $listeSeries = array_merge($listeSeries, $listeSerieExpo);
        $ExpoDefault->setFkserie($listeSeries);

        ///svg 
        $em->merge($ExpoDefault);
        $em->flush();
        ///redirection liste hote
         $this->redirect($this->generateUrl('expoSerie'));
        //***teste****//
        return new JsonResponse($listeSeries);
    }
    
    
    
    
    /**
     * Suppression d'une serie de l'exposition sous session  
     * @Route("artiste/remove/expo/serie/{id}",name="suprSerieExpo")
     */
    public function removeExpoSerie($id) {
         $em = $this->getDoctrine()->getEntityManager();
            
            $serie = $em->getRepository(Serie::class)->find($id);
            $expo = $em->getRepository(Exposition::class)->find($this->get('session')->get('expoSession')->getId());
            $series = $expo->getFkserie();
            
            for ($i = 0; $i < count($series); $i++) {
                if($series[$i] == $serie){
                     unset($series[$i]);
                      
                }
            }
              $series = array_values($series);
              
            $expo->setFkserie($series);
            $em->merge($expo);
            $em->flush();
      

        return $this->redirect($this->generateUrl('expoSerie'));
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
