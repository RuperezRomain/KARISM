<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Exposition;
use AppBundle\Entity\Place;
use AppBundle\Entity\Serie;
use AppBundle\Entity\User;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

/**
 *
 * 
 */
class ExpoController extends Controller {

    /**
     * Selection de tout les expos d'un artiste
     * @Route("/artiste/get/expos",name="selcetionListeExpo")
     */
    public function getExpos() {
        $em = $this->getDoctrine()->getManager();
        if ($this->getUser()) {
            $expos = $em->getRepository(Exposition::class)->findBy(array('fk_UserArtiste' => $this->getUser()));
            return $this->render("expo/listeExpos.html.twig", array('expos' => $expos));
        }

        return $this->redirect($this->generateUrl('login'));
    }

    /**
     * @Route("user/edite/expo",name="editeInfoExpo")
     */
    public function userEditeExpo(Request $request) {
        $em = $this->getDoctrine()->getManager();

        $expo = $em->getRepository(Exposition::class)->find($this->get('session')->get('expoSession')->getId());
        $f = $this->createForm('AppBundle\Form\ExpositionType', $expo);
        $f->handleRequest($request);

        if ($f->isSubmitted() && $f->isValid()) {
            $em->merge($expo);
            $em->flush();

            return $this->render("expo/infoExpo.html.twig", array("formInfoExpo" => $f->createView()));
        }
            return $this->render("expo/infoExpo.html.twig", array("formInfoExpo" => $f->createView()));
    }

    /**
     * Selection d'une expo 
     * @Route("/user/get/expo/{id}",name="selcetionExpo")
     */
    public function getExpo($id) {
        $em = $this->getDoctrine()->getManager();

        $expo = $em->getRepository(Exposition::class)->find($id);

        if ($expo->getfk_UserArtiste()->getId() == $this->getUser()->getId()) {

            $this->get('session')->remove('expoSession');
            $this->get('session')->set('expoSession', $expo);
            return $this->redirect($this->generateUrl('detailleExpo'));
        }

        return $this->redirect($this->generateUrl('login'));
    }

    /**
     * Initialisation formEvent
     * @Route("user/create/expo")
     */
    public function infoExpo(Request $request) {
        $em = $this->getDoctrine()->getManager();

        $expo = new Exposition;

        $f = $this->createForm('AppBundle\Form\ExpositionType', $expo);
        // et on retourne le formulaire dans notre vue
        $f->handleRequest($request);
        if ($f->isSubmitted() && $f->isValid()) {

            $expo->setFk_UserArtiste($this->getUser());
            $expo->setArtisteValid(0);
            $expo->setHoteValid(0);


            $this->get('session')->remove('expoSession');
            $this->get('session')->set('expoSession', $expo);

            $em->persist($expo);
            $em->flush($expo);

            return $this->redirect($this->generateUrl('expoSerie'));
        }

        return $this->render("expo/infoExpo.html.twig", array("formInfoExpo" => $f->createView()));
    }

    ////////////// Selection serie

    /**
     * Vue des series de l'expo
     * @Route("get/expo/serie",name="expoSerie")
     */
    public function getExpoSerie() {
        $expo = $this->getDoctrine()->getRepository(Exposition::class)->find($this->get('session')->get('expoSession')->getId());
        $expoListeSerie = $expo->getFkserie();
        return $this->render("expo/gestionSeriesExpo.html.twig", array("listesSerieExpo" => $expoListeSerie));
    }

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

        return new JsonResponse($listeSeries);
    }

    /**
     * Suppression d'une serie de l'exposition sous session  
     * @Route("artiste/remove/expo/serie/{id}",name="suprSerieExpo")
     */
    public function removeExpoSerie($id) {
        $em = $this->getDoctrine()->getManager();

        $serie = $em->getRepository(Serie::class)->find($id);
        $expo = $em->getRepository(Exposition::class)->find($this->get('session')->get('expoSession')->getId());
        $series = $expo->getFkserie();

        for ($i = 0; $i < count($series); $i++) {
            if ($series[$i] == $serie) {
                unset($series[$i]);
            }
        }
        $series = array_values($series);

        $expo->setFkserie($series);
        $em->merge($expo);
        $em->flush();


        return $this->redirect($this->generateUrl('expoSerie'));
    }

    //////// Trouver hote

    /**
     * Vue de recherche d'hote
     * @Route("artiste/get/lieux",name="listePlace")
     */
    public function getExpoLieux() {
        return $this->render("expo/gestionLieux.html.twig");
    }

    /**
     * Demande a un hote pour une expo 
     * @Route("/edit/expo/messageHote/{id}",name="envoiMessage")
     */
    public function editeExpoLieux(Request $request, $id) {
        $em = $this->getDoctrine()->getManager();
        ///Recuperation expo
        $idExpo = $this->get('session')->get('expoSession')->getId();
        $ExpoDefault = $em->getRepository(Exposition::class)->find($idExpo);
        //// Recuperation lieux 
        $place = $em->getRepository(Place::class)->find($id);
        /// Recuperation hote
        $hote = $place->getFkUserid();
        /// Recuperation message 
        $messageHote = $request->get('choixHoteExpo');

        $ExpoDefault->setFk_Place($place);
        $ExpoDefault->setFk_UserHote($hote);
        $ExpoDefault->setMessageHote($messageHote);

        $em->merge($ExpoDefault);

        $em->flush();

        return $this->redirect($this->generateUrl('detailleExpo'));
    }

    /**
     * Detaille Expo
     * @Route("/user/get/expo",name="detailleExpo")
     */
    public function getExpoDetaille() {
        $em = $this->getDoctrine()->getManager();
        ///Recuperation expo
        $idExpo = $this->get('session')->get('expoSession')->getId();
        $ExpoDefault = $em->getRepository(Exposition::class)->find($idExpo);

        return $this->render("expo/detailleExpo.html.twig", array("expo" => $ExpoDefault));
    }

    /**
     * Validation expo
     * @Route("/remote/expo/valid",name="validActeurExpo")
     */
    public function updateExpoStatueValidate() {
        $em = $this->getDoctrine()->getManager();
        $idExpo = $this->get('session')->get('expoSession')->getId();
        $ExpoDefault = $em->getRepository(Exposition::class)->find($idExpo);

        $UserDefault = $em->getRepository(User::class)->find($this->getUser()->getId());

        if ($ExpoDefault->getFk_UserArtiste() == $UserDefault) {

            if ($ExpoDefault->getArtisteValid() != true) {
                $ExpoDefault->setArtisteValid(1);
            } else {
                $ExpoDefault->setArtisteValid(0);
            }
        }

        if ($ExpoDefault->getfk_UserHote() == $UserDefault) {

            if ($ExpoDefault->getHoteValid() != true) {
                $ExpoDefault->setHoteValid(1);
            } else {
                $ExpoDefault->setHoteValid(0);
            }
        }

        $em->merge($ExpoDefault);

        $em->flush();


        return $this->redirect($this->generateUrl('selcetionExpo', array('id' => $ExpoDefault->getId())));
    }

}
