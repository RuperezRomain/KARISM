<?php

namespace AppBundle\Controller;

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
        $util->setProfilPicture($request->get("user_profilPicture"));
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

}
