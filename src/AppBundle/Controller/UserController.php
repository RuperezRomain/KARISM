<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Picture;
use AppBundle\Entity\Place;
use AppBundle\Entity\Serie;
use AppBundle\Entity\User;
use AppBundle\Entity\Wishlist;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class UserController extends Controller {


   /** 
     * @Route("/profil/edit", name="profilEdit")
     * @param Request $request
     */
    public function updateAction(Request $request) {
        $users = $this->getUser();
        $userId = $users->getId();
        $em = $this->getDoctrine()->getManager();
        $util = $em->getRepository(User::class)->find($userId);

        $f = $this->createForm('AppBundle\Form\UserType', $util);
        $utilPass = $util->getPassword();
        $utilPicture = $util->getProfilPicture();
        // et on retourne le formulaire dans notre vue
        $f->handleRequest($request);
        if ($f->isSubmitted() && $f->isValid()) {
            if ($f->get('profilPicture')->getData() !== null) {
                    $nomDuFichier = md5(uniqid()) . "." . $util->getProfilpicture()->getClientOriginalExtension();
                    $util->getProfilPicture()->move('images/profilPictures', $nomDuFichier);
                    $util->setProfilPicture($nomDuFichier);
                } else {
                    $util->setProfilPicture($utilPicture);
                }
            $util->setPassword($utilPass);
            $em->merge($util);
            $em->flush();
            return $this->redirectToRoute('accueilTest');
        }

        return $this->render('default/editProfil.html.twig', array("userType" => $f->createView()));
    }

    /**
     * @Route("/profil/get/user", name="getUser")
     */
    public function getUserInfo() {
        $users = $this->getUser();
        $userId = $users->getId();
        $user = $this->getDoctrine()->getRepository(User::class)->find($userId);
        return new JsonResponse($user);
    }

    /**
     * @Route("/profil/{id}", name="profilPublic")
     */
    public function profilPublicAction($id) {

        $user = $this->getDoctrine()->getRepository(User::class)->find($id);
        $series = $this->getDoctrine()->getRepository(Serie::class)->findByUserid($id);
        $places = $this->getDoctrine()->getRepository(Place::class)->findBy(array('fk_user' => $id));
        
        $em = $this->getDoctrine()->getManager();
       $userId = $user->getId();
        $wishlist = $em->getRepository(Wishlist::class)->findByUsermain(array("usermain" => $userId));
        $wishlisted = $em->getRepository(Wishlist::class)->findByArtiste(array("artiste" => $userId));
        
                $wishlistArtiste = array();
        for($i=0; $i< count($wishlist); $i++){
            array_push($wishlistArtiste, $wishlist[$i]);
        }        
                $wislistedArtiste = array();
        for($i=0; $i< count($wishlisted); $i++){
            array_push($wislistedArtiste, $wishlisted[$i]);
//        echo($wislistedArtiste[$i]);
        }        
        
        $userArtiste = $user->getRoles();
        $this->get('session')->remove("userProfil");
        for ($i=0; $i< count($userArtiste); $i++){
            if ($userArtiste[$i]->getRole() == "ROLE_ARTISTE"){
                $ok = "ok";
                $this->get('session')->set("userProfil", $ok);
            }
        }
        
        return $this->render('default/profil.html.twig', array("user" => $user, "places" => $places, "series" => $series, "wishlistArtiste" => $wishlistArtiste, "wislistedArtiste" => $wislistedArtiste));
    }

}
