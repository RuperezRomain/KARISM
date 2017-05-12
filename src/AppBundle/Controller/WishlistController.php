<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Wishlist;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class WishlistController extends Controller {

    /**
     * @Route("/add/wish/{id}", name="addWish")
     */
    public function addInWishlist($id) {
        $userId = $this->getUser()->getId();
        $em = $this->getDoctrine()->getManager();
//        $user = $this->getDoctrine()->getRepository(User::class)->find($userId);

        $check = array("artiste" => $id, "usermain" => $userId);
        $oldWish = $this->getDoctrine()->getRepository(Wishlist::class)->findOneBy($check);
        if ($oldWish == null){
        $newWishlist = new Wishlist();
        $newWishArtiste = $newWishlist->setArtiste($id);
        $newWishUserMain = $newWishlist->setUsermain($userId);
        $em->persist($newWishArtiste);
        $em->persist($newWishUserMain);
        $em->flush($newWishlist);
        }else{
        return new Response("Cet artiste est déjà dans ta Wishlist");  
        }
        return new Response("ok");
    }

}
