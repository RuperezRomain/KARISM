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
     */
    public function profilEdit() {
        return $this->render('default/editProfil.html.twig');
    }

    /**
     * @Route("/profil/update", name="editProfil")
     * @param Request $request
     */
    public function updateAction(Request $request) {
        $users = $this->getUser();
        $userId = $users->getId();
        $em = $this->getDoctrine()->getManager();
        $util = $em->getRepository(User::class)->find($userId);
        $util->setFirstname($request->get("firstname"));
        $util->setLastname($request->get("lastname"));
        $util->setUsername($request->get("username"));
        $util->setPhone($request->get("phone"));
        $util->setAdress($request->get("adress"));
        $util->setBio($request->get("bio"));
        $util->setGenre($request->get("genre"));
        $util->setLinkFacebook($request->get("facebook"));
        $util->setLinkInstagram($request->get("instagram"));
        $util->setLinkTwitter($request->get("twitter"));
//        $util->setProfilPicture($request->get("user_profilPicture"));
        $em->merge($util);
        $em->flush();
        return new Response("ok");
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
        if ($series != null) {
            for ($i = 0; $i < count($series); $i++) {
                $pictures = $series[$i]->getFk_picture();
            }
        }
//        $lieux = $this->getDoctrine()->getRepository(Place::class)->findByUserId($id);
//        if ($lieux != null) {
//            for ($i = 0; $i < count($series); $i++) {
//                $places = $lieux[$i]->getFk_imagesPlace();
//            }
//        }
        if ($series != null) {
            return $this->render('default/profil.html.twig', array("user" => $user, "series" => $series, "pictures" => $pictures));
        } 
//        else if ($lieux != null) {
//            return $this->render('default/profil.html.twig', array("user" => $user, "series" => $series, "places" => $places));
//        } 
//        else if ($lieux != null && $series != null) {
//            return $this->render('default/profil.html.twig', array("user" => $user, "series" => $series, "pictures" => $pictures, "places" => $places));
//        } 
        else {
            return $this->render('default/profil.html.twig', array("user" => $user, "series" => $series));
        }
    }

}
