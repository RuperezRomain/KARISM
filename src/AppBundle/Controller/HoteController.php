<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace AppBundle\Controller;

use AppBundle\Entity\ImagesPlaces;
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
        if ($user->getHoteValidate() === null){
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
            return $this->redirectToRoute('accueilTest');
            }
            $this->get('session')->set('placeDefault', $lieu);
            $listImg = $lieu->getFk_ImagesPlace();
            return $this->render('hote/formCreatePlace.html.twig', array("PlaceType" => $f->createView(),'pictures'=>$listImg));
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
                 
            $this->get('session')->set('placeDefault', $lieuDefault);
              $f = $this->createForm('AppBundle\Form\PlaceFormType', $lieuDefault);
            // et on retourne le formulaire dans notre vue
            $f->handleRequest($request);
            if ($f->isSubmitted() && $f->isValid()) {
                $em->persist($lieuDefault);
                $em->flush($lieuDefault);
              
            return $this->redirectToRoute('accueilTest');
            }
            $listImg = $lieuDefault->getFk_ImagesPlace();
            return $this->render('hote/formCreatePlace.html.twig', array("PlaceType" => $f->createView(),"pictures"=>$listImg));
       

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
    public function creatPlace(Request $request) {
        $nomLieu = $request->get('nomSerie');
        $em = $this->getDoctrine()->getManager();
        $lieuDefault = $this->SelectePlace($nomLieu);
        $f = $this->createForm('AppBundle\Form\PlaceFormType', $lieuDefault);
            // et on retourne le formulaire dans notre vue
            $f->handleRequest($request);
            if ($f->isSubmitted() && $f->isValid()) {
                $em->persist($lieuDefault);
                $em->flush($lieuDefault);
            return $this->redirectToRoute('accueilTest');
            }
            $listImg = $lieuDefault->getFk_ImagesPlace(); 
            return $this->render('hote/formCreatePlace.html.twig', array("PlaceType" => $f->createView(),"pictures"=>$listImg));
    }
    
    
    /**
     * @Route("hote/create/lieu/picture", name="createPicPlace")
     */
    public function createLieuPic(Request $request){
        
        $em = $this->getDoctrine()->getManager();
        
         //Creation et insertion dans le token de l'entité 
      
        
      
         
        $lieuDefault = $em->getRepository(Place::class)->find($this->get('session')->get('placeDefault')->getId());   

         
        
       
        
        //Recuperation imgLieux
        $listImg = $lieuDefault->getFk_ImagesPlace();   
        //Recuperation imgLieux Form

        $image = new ImagesPlaces();
              /****Validation ******/
              $f = $this->createForm('AppBundle\Form\ImagesPlacesType',$image);
            // et on retourne le formulaire dans notre vue
            $f->handleRequest($request);
            if ($f->isSubmitted() && $f->isValid()) {
              
                // On recupere le nom du fichier, on genere un nom numerique aleatoire et on creer un dossier uploads/images 
            $nomDuFichier = md5(uniqid()) . "." . $image->getName()->getClientOriginalExtension();
            $image->getName()->move('images/placePictures', $nomDuFichier);
            $image->setName($nomDuFichier);
            
              $em->persist($image);
              $em->flush();
            
                
                array_push($listImg,$image);
                  $lieuDefault->setFk_ImagesPlace($listImg);      
                $em->merge($lieuDefault);
              $em->flush();
            return $this->render('hote/gestionPicturePlace.html.twig', array("PlacePictForm" => $f->createView(),"pictures"=>$listImg));
            }
            
            
        
            return $this->render('hote/gestionPicturePlace.html.twig', array("PlacePictForm" => $f->createView(),"pictures"=>$listImg));
       
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

     /**
     * @Route("hote/remove/imagePlace/{id}", name="suprImgPlace")
     */
    public function deletePicturePlace($id) {

        $em = $this->getDoctrine()->getEntityManager();
        
        //Selection de la picture a supr
        $pictureLieux = $em->getRepository(ImagesPlaces::class)->find($id);
        //Selection de la place 
        $placeDefault = $this->get('session')->get('placeDefault');
        
        $lieuDefault = $em->getRepository(Place::class)->find($placeDefault->getId());
        
        $listeImg = $lieuDefault->getFk_ImagesPlace();
        unset($listeImg[array_search($pictureLieux, $listeImg)]); 
        
        $lieuDefault->setFk_ImagesPlace($listeImg);
        
            $em->merge($lieuDefault);
            // Verification que l'image est bien dans une serie de user courant
            $em->remove($pictureLieux);
            $em->flush();
     

        return $this->redirect($this->generateUrl('createPicPlace'));
    }

    
}