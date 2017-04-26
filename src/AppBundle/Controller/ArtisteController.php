<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace AppBundle\Controller;

use AppBundle\Entity\Serie;
use AppBundle\Entity\User;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

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
        $serieDefault = $em->getRepository(Serie::class)->findBy(array('name' => 'Default', 'userid' => $userId));
        if ($serieDefault == null) {

            // Initalisation boolean ArtistValidate
            $user->setArtistValidate(0);
            $em->merge($user);
            $em->flush($user);

            //Creation serie par default
            $serieDefault = new Serie();
            $serieDefault->setName("Default");
            $serieDefault->setUserid($user);
            $em->persist($serieDefault);
            $em->flush();
            
        } 


//           
//////////////////test Vue///////////////////
        return $this->render('default/Perso/formCreateSerie.html.twig');
    }

    /**
     * @Route("user/edit/role/role_artiste")
     */
    public function createSeriePicturs() {
        
        
        
    }

}
