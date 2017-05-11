<?php

namespace AppBundle\Controller;

use AppBundle\Entity\City;
use AppBundle\Entity\User;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;

class RechercheController extends Controller {

    /**
     * @Route("/artists")
     * @Method({"GET"})
     */
    public function getArtistes() {
        $artistes = $this->getDoctrine()->getRepository(User::class)->findByArtistValidate(1);
        return new JsonResponse($artistes);
    }

    /**
     * @Route("/hosts")
     * @Method({"GET"})
     */
    public function getHotes() {
        $hotes = $this->getDoctrine()->getRepository(User::class)->findByHoteValidate(1);
        return new JsonResponse($hotes);
    }

    /**
     * @Route("/guests")
     * @Method({"GET"})
     */
    public function getGuests() {
        $guests = $this->getDoctrine()->getRepository(User::class)->findBy(array(
            'hoteValidate' => 0,
            'artistValidate' => 0
        ));

        return new JsonResponse($guests);
    }
    
    /**
     * @Route("/cities")
     * @Method({"GET"})
     */
    public function getCities() {
        $cities = $this->getDoctrine()->getRepository(City::class)->findAll();
        return new JsonResponse($cities);
    }
    
//    /**
//     * @Route("/expos")
//     * @Method({"GET"})
//     */
//    public function getExpos() {
//        $expos = $this->getDoctrine()->getRepository(\AppBundle\Entity\Exposition::class)->findbyValidate(1);
//        return new JsonResponse($expos);
//    }
}
