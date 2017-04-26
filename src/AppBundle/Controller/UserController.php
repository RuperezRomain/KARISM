<?php

namespace AppBundle\Controller;

use AppBundle\Entity\User;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\HttpFoundation\File\UploadedFile;
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

        $u = $this->getUser();
        $f = $this->createForm($u);
        $f->handleRequest($request);
        $nomDuFichier = md5(uniqid()) . '.' . $u->getProfilPicture()->getClientOriginalExtension();
        $u->getProfilPicture()->move('../web/images/profilPictures', $nomDuFichier);
        $u->setProfilPicture($nomDuFichier);
        $em = $this->getDoctrine()->getManager();
        $utilisateur = $em->getRepository(User::class)->find($u);
        $em->merge($utilisateur);
        $em->flush();

//        $users = $this->getUser();
//        $userId = $users->getId();
//        $em = $this->getDoctrine()->getManager();
//        $util = $em->getRepository(User::class)->find($userId);
//        $util->setFirstname($request->get("firstname"));
//        $util->setLastname($request->get("lastname"));
//        $util->setUsername($request->get("username"));
//        $util->setPhone($request->get("phone"));
//        $util->setAdress($request->get("adress"));
//        $util->setBio($request->get("bio"));
//        $util->setGenre($request->get("genre"));
//        $UploadedFile = new UploadedFile($request->get("previewPicture"), "nom");
//        $file = new File($UploadedFile);
//        $nomDuFichier = md5(uniqid()) . '.' . $file->getClientOriginalExtension();
//        $file->move('../web/profil', $nomDuFichier);
//        $util->setProfilPicture($file);
////        $image = base64_decode($request->get("previewPicture"));
////        $util->setProfilPicture($request->get("previewPicture"));
//        $em->merge($util);
//        $em->flush();
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
