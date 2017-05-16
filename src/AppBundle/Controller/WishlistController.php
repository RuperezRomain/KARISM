<?php

namespace AppBundle\Controller;

use AppBundle\Entity\User;
use AppBundle\Entity\Wishlist;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class WishlistController extends Controller {

    /**
     * @Route("/add/wish/{id}", name="addWish")
     */
    public function addInWishlist($id) {
        $userId = $this->getUser()->getId();
        $em = $this->getDoctrine()->getManager();
        $userMain = $this->getDoctrine()->getRepository(User::class)->find($userId);
        $userArtiste = $this->getDoctrine()->getRepository(User::class)->find($id);

        $check = array("artiste" => $id, "usermain" => $userId);
        $oldWish = $this->getDoctrine()->getRepository(Wishlist::class)->findOneBy($check);
        if ($oldWish == null) {
            $newWishlist = new Wishlist();
            $newWishlist->setArtiste($userArtiste);
            $newWishlist->setUsermain($userMain);
            $em->persist($newWishlist);
            $em->flush($newWishlist);
        } else {
            return new Response("Cet artiste est déjà dans ta Wishlist");
        }
        return new Response("ok");
    }

    /**
     * @Route("/get/wishlist/{id}", name="getwish")
     */
    public function getWishlist($id) {
        $em = $this->getDoctrine()->getManager();
        $user = $this->getDoctrine()->getRepository(User::class)->find($id);
        $userId = $user->getId();
        $wishlist = $em->getRepository(Wishlist::class)->findByUsermain(array("usermain" => $userId));

        $wishlistArtiste = array();
        for ($i = 0; $i < count($wishlist); $i++) {
            array_push($wishlistArtiste, $wishlist[$i]);
//            $wishlistArtiste[$i]->getArtiste();
//            echo($wishlistArtiste[$i]);
        }
        return new JsonResponse($wishlistArtiste);
//        return $this->render('default/wishlist.html.twig', array("wishlistArtiste" => $wishlistArtiste, "user" => $user));
    }

    /**
     * @Route("/check/wish/{id}", name="checkWish")
     */
    public function checkWishlist($id) {
        $userId = $this->getUser()->getId();

        $check = array("artiste" => $id, "usermain" => $userId);
        $oldWish = $this->getDoctrine()->getRepository(Wishlist::class)->findOneBy($check);
        if ($oldWish == null) {
            return new Response("Tu peux ajouter cet artiste");
        } else {
            return new Response("Cet artiste est déjà dans ta Wishlist");
        }
    }

    /**
     * Retourne le Nombre de fois que l'artiste a été wishlisté
     * @Route("/get/wish/nbr/artiste/{id}")
     */
    public function getNbrWishlisted($id) {
        $nbr = 0;

        $wishlisted = $this->getDoctrine()->getRepository(Wishlist::class)->findByArtiste($id);
        for ($i = 0; $i < count($wishlisted); $i++) {
            $nbr = $nbr + 1;
        }
        return new JsonResponse($nbr);
    }

    /**
     * Retourne le Nombre de fois que l'artiste a été wishlisté
     * @Route("/get/wish/nbr/usermain/{id}")
     */
    public function getNbrInWishlist($id) {
        $nbr = 0;

        $wishlisted = $this->getDoctrine()->getRepository(Wishlist::class)->findByUsermain($id);
        for ($i = 0; $i < count($wishlisted); $i++) {
            $nbr = $nbr + 1;
        }
        return new JsonResponse($nbr);
    }

    /**
     * @Route("/delete/wish/artiste/{id}", name="deleteWishArtiste")
     */
    public function deleteWishlistArtiste($id) {

        $em = $this->getDoctrine()->getEntityManager();

$userId = $this->getUser()->getId();
        
$check = array("artiste" => $id, "usermain" => $userId);
        $wishlistedArtiste = $em->getRepository(Wishlist::class)->findOneBy($check);

//echo($wishlistedArtiste);
        $em->remove($wishlistedArtiste);
        $em->flush();


//        return new JsonResponse($wishlistedArtiste);
        return new Response("suppression");
    }

}
