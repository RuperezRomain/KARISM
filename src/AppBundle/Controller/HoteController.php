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
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

/**
 * Description of HoteController
 */
class HoteController extends Controller {

    /**
     * @Route("user/request/role/hote")
     */
    public function userAddRoleHoteRequest(Request $request) {
        $em = $this->getDoctrine()->getManager();
        // get user in session
        $userId = $this->getUser()->getId();
        $user = $this->getDoctrine()->getRepository(User::class)->find($userId);

        $placeDefault = $em->getRepository(Place::class)->findBy(array('fk_user' => $userId));
        if ($placeDefault == null) {
            // Init boolean HoteValidate
            // This is for the admin, he will be available to see the role request of the user
            $user->setHoteValidate(0);
            $em->merge($user);
            $em->flush($user);
            // Creating Place
            $lieu = new Place();
            $lieu->setUserid($user);
            $lieu->setName("Default");

            // on lie notre formulaire a notre entity
            $f = $this->createForm('AppBundle\Form\PlaceFormType', $lieu);

            // et on retourne le formulaire dans notre vue
            $f->handleRequest($request);
            if ($f->isSubmitted() && $f->isValid()) {
                $em->persist($lieu);
                $em->flush($lieu);
            return $this->redirectToRoute('profilTest');
            }
            return $this->render('default/formCreatePlace.html.twig', array("PlaceType" => $f->createView()));
        }
    }

    /**
     * @Route("user/request/role/hote/edit")
     */
    public function userEditRoleHoteRequest(Request $request) {

        $em = $this->getDoctrine()->getManager();
        // get user in session
        $userId = $this->getUser()->getId();
        $user = $this->getDoctrine()->getRepository(User::class)->find($userId);

        $placeDefaultTbl = $em->getRepository(Place::class)->findBy(array('name' => 'Default', 'fk_user' => $user));
        if ($placeDefaultTbl == null) {

            // Initalisation boolean ArtistValidate
            $user->setArtistValidate(0);
            $em->merge($user);
            $em->flush($user);

            // Creation place par default
//            $em->persist($placeDefault);
        } else {
            // Ou merge si il exsiste
            $placeDefault = $placeDefaultTbl[0];
            $em->merge($placeDefault);
        }
//        $em->flush();
        $placeDefault = $placeDefaultTbl[0];

        $f = $this->createForm('AppBundle\Form\PlaceFormType', $placeDefault);
        $f->handleRequest($request);
        if ($f->isSubmitted() && $f->isValid()) {
            $em->persist($placeDefault);
            $em->flush($placeDefault);
        }
        return $this->render('default/formCreatePlace.html.twig', array("PlaceType" => $f->createView()));
    }

}
