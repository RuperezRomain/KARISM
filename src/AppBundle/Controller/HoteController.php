<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace AppBundle\Controller;

use AppBundle\Entity\Place;
use AppBundle\Entity\User;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Description of HoteController
 */
class HoteController extends Controller {

    
    /**
     * @Route("user/request/role/hote",name="requestHote")
     */
    public function userAddRoleHoteRequest(Request $request) {
        $em = $this->getDoctrine()->getManager();
        // get user in session
        $userId = $this->getUser()->getId();
        $user = $this->getDoctrine()->getRepository(User::class)->find($userId);
            // Init boolean HoteValidate
            // This is for the admin, he will be available to see the role request of the user
        if ($user->getHoteValidate() === 0){
            $user->setHoteValidate(0);
            $em->merge($user);
            $em->flush($user);
        }
            // Creating Place
            $lieu = $this->SelectePlace("Default");
            

            // on lie notre formulaire a notre entity
            $f = $this->createForm('AppBundle\Form\PlaceFormType', $lieu);
            // et on retourne le formulaire dans notre vue
            $f->handleRequest($request);
            if ($f->isSubmitted() && $f->isValid()) {
                $em->persist($lieu);
                $em->flush($lieu);
            return $this->redirectToRoute('profilTest');
            }
            return $this->render('hote/formCreatePlace.html.twig', array("PlaceType" => $f->createView()));
        }
    
        
        
        
    /**
     * @Route("user/get/lieux",name="hotePlaces")
     */
    public function getUserPlaces(){
        $em = $this->getDoctrine()->getManager();
        
        $userId = $this->getUser()->getId();

        $lieuDefaultTbl = $em->getRepository(Place::class)->findBy(array('fk_user' =>  $userId));
        
        return $this->render('hote/gestionPlace.html.twig',array('places'=>$lieuDefaultTbl));
    }
    
    /**
     * @Route("hote/get/lieu/{id}")
     */
    public function getPlace(Request $request,$id){
        
         $em = $this->getDoctrine()->getManager();
         $userId = $this->getUser()->getId();
         
          $lieuDefault = $em->getRepository(Place::class)->find($id);
        $lieux = $lieuDefault->getFkUserid()->getId();
          
          if( $lieux == $userId ){
              
              $f = $this->createForm('AppBundle\Form\PlaceFormType', $lieuDefault);
            // et on retourne le formulaire dans notre vue
            $f->handleRequest($request);
            if ($f->isSubmitted() && $f->isValid()) {
                $em->persist($lieuDefault);
                $em->flush($lieuDefault);
            return $this->redirectToRoute('profilTest');
            }
            return $this->render('hote/formCreatePlace.html.twig', array("PlaceType" => $f->createView()));
       

    }
    }





public function SelectePlace($nomLieu){
        
        $em = $this->getDoctrine()->getManager();
        $userId = $this->getUser()->getId();
        $user = $this->getDoctrine()->getRepository(User::class)->find($userId);
        // Check si la table Default pour cette user n'existe pas
        $lieuDefaultTbl = $em->getRepository(Place::class)->findBy(array('name' => $nomLieu, 'fk_user' => $user->getId()));
        if ($lieuDefaultTbl == null) {
              
            $em->merge($user);
            $em->flush($user);

            // Creation serie par default
            $lieuDefault = new Place();
            $lieuDefault->setName($nomLieu);
            $lieuDefault->setUserid($user);
            $em->persist($lieuDefault);
        } else {
            // Ou merge si il exsiste
            $lieuDefault = $lieuDefaultTbl[0];
            $em->merge($lieuDefault);
        }

        $em->flush();
        return $lieuDefault ;
    }
    
    
    /**
     * 
     * @Route("hote/create/lieu",name="valideNomLieux")
     */
    public function creatSerie(Request $request) {
        $nomLieu = $request->get('nomSerie');
        $em = $this->getDoctrine()->getManager();
        $lieuDefault = $this->SelectePlace($nomLieu);
        $f = $this->createForm('AppBundle\Form\PlaceFormType', $lieuDefault);
            // et on retourne le formulaire dans notre vue
            $f->handleRequest($request);
            if ($f->isSubmitted() && $f->isValid()) {
                $em->persist($lieuDefault);
                $em->flush($lieuDefault);
            return $this->redirectToRoute('profilTest');
            }
            return $this->render('hote/formCreatePlace.html.twig', array("PlaceType" => $f->createView()));
       

    
        
    }
    
    /**
     * @Route("hote/remove/place/{id}", name="suprPlace")
     */
    public function deletePlace($id) {

        $em = $this->getDoctrine()->getEntityManager();
        $userId = $this->getUser()->getId();

        $lieuDefault = $em->getRepository(Place::class)->find($id);
        $idIser = $lieuDefault->getFkUserid()->getId();

        if ($userId == $idIser) {
            $em->remove($lieuDefault);
            $em->flush();
        }


        return $this->redirect($this->generateUrl('hotePlaces'));
    }

}