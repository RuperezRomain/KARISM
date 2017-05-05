<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace AppBundle\Controller;

use AppBundle\Entity\Role;
use AppBundle\Entity\User;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;

/**
 * Description of AdminController
 *
 * @author vien34
 * @Route("/admin")
 */
class AdminController extends Controller {

    /**
     * @Route("/demande", name="adminDemande")
     */
    public function adminDemandeValidation() {
          $usersArtiste = $this->getDoctrine()->getRepository(User::class)->findByArtistValidate(0);
          $usersHote = $this->getDoctrine()->getRepository(User::class)->findByHoteValidate(0);
        return $this->render('admin/demandeValidation.html.twig',array('usersArtiste' => $usersArtiste,'usersHote'=>$usersHote));
    }

    /**
     * Validation postive dune demande re role ArtisteUser
     * @Route("/remote/user/{id}/artiste/valid")
     */
    public function remoteUserArtisteValid($id) {
        $em = $this->getDoctrine()->getManager();
        
        //Recuperation de l'entity roleArtiste
        $rolesArtistes = $this->getDoctrine()->getRepository(Role::class)->findByRole("ROLE_ARTISTE");
        $roleArtiste = $rolesArtistes[0];
        
        //Recuperation de l'entity User a valider 
        $user = $this->getDoctrine()->getRepository(User::class)->find($id);         
        $listeRoleUser = $user->getRoles();
        array_push($listeRoleUser, $roleArtiste);
        $user->setRoles($listeRoleUser);
        $user->setArtistValidate(1);
        $em->merge($user);
        $em->flush($user);
        
        
        return new JsonResponse();
    }
    
    /**
     * Validation postive dune demande re role HoteUser
     * @Route("/remote/user/{id}/hote/valid")
     */
    public function remoteUserHoteValid($id) {
        $em = $this->getDoctrine()->getManager();
        
        //Recuperation de l'entity roleHote
        $rolesHote = $this->getDoctrine()->getRepository(Role::class)->findByRole("ROLE_HOTE");
        $roleHote = $rolesHote[0];
        
        //Recuperation de l'entity User a valider 
        $user = $this->getDoctrine()->getRepository(User::class)->find($id);         
        $listeRoleUser = $user->getRoles();
        array_push($listeRoleUser, $roleHote);
        $user->setRoles($listeRoleUser);
        $user->setHoteValidate(1);
        $em->merge($user);
        $em->flush($user);
        
        return new JsonResponse();
    }
    
    
    
    /**
     * Validation Négative dune demande re role ArtisteUser
     * @Route("/remote/user/{id}/artiste/refuse")
     */
    public function remoteUserArtisteRefuse($id) {

        $user = $this->getDoctrine()->getRepository(User::class)->find($id);
        $user->setArtistValidate(null);
        
        $em = $this->getDoctrine()->getManager();
        $em->merge($user);
        $em->flush($user);
        
        
        return new JsonResponse();
    }

    

}
