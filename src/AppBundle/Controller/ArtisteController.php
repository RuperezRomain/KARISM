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
     * @Route("user/edit/role/role_artiste")
     */
    public function userAddrole_artiste(Request $request) {

        $em = $this->getDoctrine()->getManager();

        // Recup id user courante
        $userId = $this->getUser()->getId();
        $user = $this->getDoctrine()->getRepository(User::class)->find($userId);

        // Check si la table Default pour cette user n'existe pas
        $serieDefaultTbl = $em->getRepository(Serie::class)->findBy(array('name' => 'Default', 'userid' => $userId));
        if ($serieDefaultTbl == null) {

            // Initalisation boolean ArtistValidate
            $user->setArtistValidate(0);
            $em->merge($user);
            $em->flush($user);

            // Creation serie par default
            $serieDefault = new Serie();
            $serieDefault->setName("Default");
            $serieDefault->setUserid($user);
            $em->persist($serieDefault);
            $em->flush();
        } else {
            // Ou merge si il exsiste
            $serieDefault = $serieDefaultTbl[0];
            $em->merge($serieDefault);
            $em->flush($serieDefault);
        }

        $this->get('session')->set('serieDefault', $serieDefault);

        $picture = new Picture();
        // on lie notre formulaire a notre entity
        $f =  $this->createForm('AppBundle\Form\PictureType', $picture);
        // et on retourne le formulaire dans notre vue
         $f->handleRequest($request);
         
         
         
        if ($f->isSubmitted() && $f->isValid()) {
            
            // on recupere le nom du fichier, on genere un nom numerique aleatoire et on creer un dossier uploads/images 
            $nomDuFichier = md5(uniqid()) . "." . $picture->getImg()->getClientOriginalExtension();
            $picture->getImg()->move('images/oeuvrePictures', $nomDuFichier);
            $picture->setImg($nomDuFichier);
            
            $em->persist($picture);
            $em->flush($picture);
            //Edition de la serie 

            $idSerie = $this->get('session')->get('serieDefault')->getId();
            $courantSerie = $this->getDoctrine()->getRepository(Serie::class)->find($idSerie);

            $em->merge($courantSerie);
            $arrayPicture = $courantSerie->getFk_picture();
            array_push($arrayPicture, $picture);
            $courantSerie->setFk_picture($arrayPicture);

            $em->flush($courantSerie);
        }


        return $this->render('default/Perso/formCreateSerie.html.twig', array("formPicture" => $f->createView()));
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

}
