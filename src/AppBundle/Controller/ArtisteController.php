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
    public function userAddrole_artiste() {

        // Recup id user courante
        $em = $this->getDoctrine()->getManager();
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



//           
//////////////////test Vue///////////////////
        return $this->render('default/Perso/formCreateSerie.html.twig');
    }

    //////////////////Save picture///////////////////
    /**
     * @Route("user/create/picture")
     */
    public function createPicturs(Request $request) {


        //Récuperation de la requet ajax
        $picNom = $request->get('nom');
        $picStyle = $request->get('style');
        $picTech = $request->get('tech');
        $picGenre = $request->get('genre');
        $picSize = $request->get('size');
        $picPrix = $request->get('prix');
        $picExpo = $request->get('expo');
        $picComm = $request->get('comm');
        $picImg = $request->get('img');

        //Creation entity Picture
        $em = $this->getDoctrine()->getManager();

        $picture = new Picture();
        $picture->setNom($picNom);
        $picture->setStyle($picStyle);
        $picture->setTechniques($picTech);
        $picture->setGenres($picGenre);
        $picture->setSize($picSize);
        $picture->setPrix($picPrix);
        $picture->setExpos($picExpo);
        $picture->setCommentaire($picComm);
        $picture->setImg($picImg);

        $em->persist($picture);
        
       

        //Récuperation de mon object serie sous session
        $idSerie = $this->get('session')->get('serieDefault')->getId();
        $courantSerie = $this->getDoctrine()->getRepository(Serie::class)->find($idSerie);
        //Edition de la serie 
        $em->merge($courantSerie);
        $arrayPicture =  $courantSerie->getFk_picture();
        array_push($arrayPicture, $picture);        
        $courantSerie->setFk_picture($arrayPicture);

        $em->flush();
        
        
        $this->get('session')->clear();
        return new JsonResponse();
    }

}
