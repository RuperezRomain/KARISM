<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace AppBundle\Controller;

use AppBundle\Entity\Picture;
use AppBundle\Entity\Serie;
use AppBundle\Entity\User;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

/**
 * Description of ArtisteController
 *
 * @author vien34
 */
class ArtisteController extends Controller {

    /**
     * 
     * @Route("user/edit/role/role_artiste/{id}")
     */
    public function user_artisteGestion(Request $request, $id) {

        $em = $this->getDoctrine()->getManager();
        // cheek du parametre $id
        if ($id === 'Default') {
            $serieDefault = $this->gestionSerie($id);
        } else {
            $serieDefault = $this->getDoctrine()->getRepository(Serie::class)->find($id);
        }

        //Creation de la serie sous session
        $this->get('session')->set('serieDefault', $serieDefault);

        $picture = new Picture();
        // on lie notre formulaire a notre entity
        $f = $this->createForm('AppBundle\Form\PictureType', $picture);
        // et on retourne le formulaire dans notre vue
        $f->handleRequest($request);

        if ($f->isSubmitted() && $f->isValid()) {

            // On recupere le nom du fichier, on genere un nom numerique aleatoire et on creer un dossier uploads/images 
            $nomDuFichier = md5(uniqid()) . "." . $picture->getImg()->getClientOriginalExtension();
            $picture->getImg()->move('images/oeuvrePictures', $nomDuFichier);
            $picture->setImg($nomDuFichier);

            $em->persist($picture);
            $em->flush($picture);

            // Selection de l'user courant
            $idSerie = $this->get('session')->get('serieDefault')->getId();
            $courantSerie = $this->getDoctrine()->getRepository(Serie::class)->find($idSerie);


            // Atribution si vide de l'image a la serie 
            if ($courantSerie->getImg() == null) {
                $courantSerie->setImg($nomDuFichier);
            }

            // Asociation de la picture a l'user 
            $em->merge($courantSerie);
            $arrayPicture = $courantSerie->getFk_picture();
            array_push($arrayPicture, $picture);
            $courantSerie->setFk_picture($arrayPicture);

            $em->flush($courantSerie);
        }


        return $this->render('artiste/formCreateSerie.html.twig', array("formPicture" => $f->createView()));
    }


    public function gestionSerie($nomSerie) {
        $em = $this->getDoctrine()->getManager();
        $user = $this->getUserSetion();

        // Check si la table Default pour cette user n'existe pas
        $serieDefaultTbl = $em->getRepository(Serie::class)->findBy(array('name' => $nomSerie, 'userid' => $user->getId()));
        if ($serieDefaultTbl == null) {

            // Initalisation boolean ArtistValidate
            if ($user->getArtistValidate() == null) {
                $user->setArtistValidate(0);
            }
            $em->merge($user);
            $em->flush($user);

            // Creation serie par default
            $serieDefault = new Serie();
            $serieDefault->setName($nomSerie);
            $serieDefault->setUserid($user);
            $em->persist($serieDefault);
        } else {
            // Ou merge si il exsiste
            $serieDefault = $serieDefaultTbl[0];
            $em->merge($serieDefault);
        }
      
            $em->flush();
 

        return $serieDefault;
    }

// Recup id user courante
    public function getUserSetion() {

        $userId = $this->getUser()->getId();
        $user = $this->getDoctrine()->getRepository(User::class)->find($userId);
        return $user;
    }

    /**
     * @Route("get/user/serie/pictures")
     */
    public function getPicture() {

        $serie = $this->getDoctrine()->getRepository(Serie::class)->find($this->get('session')->get('serieDefault')->getId());
        $listePic = $serie->getFk_picture();

        json_encode($listePic);
        return new JsonResponse($listePic);
    }

   
    /**
     * Liste des serie dun artiste 
     * @Route("artiste/get/series/user/{id}")
     * 
     */
    public function getSeriesUser($id) {

        $series = $this->getDoctrine()->getRepository(Serie::class)->findByUserid($id);

        return $this->render('artiste/gestionSeries.html.twig', array('series' => $series));
    }


    /**
     * @Route("delete/cache/pictures")
     */
    public function deleteCachePserieDefault() {
        $this->get('session')->remove('serieDefault');
        return new JsonResponse();
    }
}
