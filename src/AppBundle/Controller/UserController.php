<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Picture;
use AppBundle\Entity\Place;
use AppBundle\Entity\Serie;
use AppBundle\Entity\User;
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
        
        // et on retourne le formulaire dans notre vue
        $f->handleRequest($request);
        if ($f->isSubmitted() && $f->isValid()) {
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

        return $this->render('default/profil.html.twig', array("user" => $user, "places" => $places, "series" => $series));
    }

}
