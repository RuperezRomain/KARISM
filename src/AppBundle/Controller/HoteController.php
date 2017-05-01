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
     * @Route("user/edit/role/role_hote")
     */
    public function userAddrole_hote(Request $request) {
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
                        print_r('iff');

        } 
        else {
            // Ou merge si il exsiste
            print_r('else');
        $lieu = $em->getRepository(Place::class)->findBy(array('fk_user' => $userId));
            $placeDefault = $placeDefault[0];
            $em->merge($placeDefault);
            $em->flush($placeDefault);
        }
        

        // on lie notre formulaire a notre entity
        $f = $this->createForm('AppBundle\Form\PlaceFormType', $lieu);
        // et on retourne le formulaire dans notre vue
        $f->handleRequest($request);
        if ($f->isSubmitted() && $f->isValid()) {
            // on recupere le nom du fichier, on genere un nom numerique aleatoire et on creer un dossier uploads/images 
//            $nomDuFichier = md5(uniqid()) . "." . $lieu->getImg()->getClientOriginalExtension();
//            $lieu->getImg()->move('images/oeuvrePictures', $nomDuFichier);
//            $lieu->setImg($nomDuFichier);
//            $lieu->setAdress("test");
            $em->persist($lieu);
            $em->flush($lieu);
        }
        return $this->render('default/formCreatePlace.html.twig', array("PlaceType" => $f->createView()));
    }

}
