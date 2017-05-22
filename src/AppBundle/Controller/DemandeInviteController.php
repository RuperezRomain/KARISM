<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Demande_expo;
use AppBundle\Entity\Exposition;
use AppBundle\Entity\User;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

/**
 *
 * 
 */
class DemandeInviteController extends Controller {

    /**
     * @Route("/expo/invite/user/{id}")
     */
    public function inviteUser($id) {

        $em = $this->getDoctrine()->getManager();

        $idExpo = $this->get('session')->get('expoSession')->getId();
        $guest = $em->getRepository(User::class)->find($id);
        $expos = $em->getRepository(Exposition::class)->find($idExpo);

        $check = array("guest" => $guest, "expo" => $expos);
        $checkDemande = $em->getRepository(Demande_expo::class)->findBy($check);

        if ($checkDemande == null) {
            $demande = new Demande_expo();
            $demande->setExpo($expos);
            $demande->setGuest($guest);
            $demande->setValidate(0);

            $em->persist($demande);
            $em->flush($demande);
        } else {

            return new Response('Déjà invité');
        }
        return new Response('ok');
    }

    /**
     * @Route("/get/demande")
     */
    public function getDemandeFromExpo() {

        $em = $this->getDoctrine()->getManager();
        $userId = $this->getUser()->getId();

        $checkDemande = $em->getRepository(Demande_expo::class)->findBy(array("guest" => $userId));
        return $this->render('default/getDemande.html.twig', array("checkDemande" => $checkDemande));
    }

    /**
     * @Route("/expo/{id}/invite/accept")
     */
    public function acceptInvite($id) {

        $em = $this->getDoctrine()->getManager();
        $userId = $this->getUser()->getId();

        $guest = $em->getRepository(User::class)->find($userId);
        $expos = $em->getRepository(Exposition::class)->find($id);

        $check = array("guest" => $guest, "expo" => $expos);
        $inviteExpo = $em->getRepository(Demande_expo::class)->findOneBy($check);

        $inviteExpo->setValidate(1);
        $em->merge($inviteExpo);
        $em->flush($inviteExpo);

        return new Response('accept');
    }

    /**
     * @Route("/expo/{id}/invite/decline")
     */
    public function declineInvite($id) {

        $em = $this->getDoctrine()->getManager();
        $userId = $this->getUser()->getId();

        $guest = $em->getRepository(User::class)->find($userId);
        $expos = $em->getRepository(Exposition::class)->find($id);

        $check = array("guest" => $guest, "expo" => $expos);
        $inviteExpo = $em->getRepository(Demande_expo::class)->findOneBy($check);

        $inviteExpo->setValidate(2);
        $em->merge($inviteExpo);
        $em->flush($inviteExpo);

        return new Response('decline');
    }

    /**
     * @Route("/expo/{id}/invite/switch")
     */
    public function switchInvite($id) {

        $em = $this->getDoctrine()->getManager();
        $userId = $this->getUser()->getId();

        $guest = $em->getRepository(User::class)->find($userId);
        $expos = $em->getRepository(Exposition::class)->find($id);

        $check = array("guest" => $guest, "expo" => $expos);
        $inviteExpo = $em->getRepository(Demande_expo::class)->findOneBy($check);
        
        $checkValidate = $inviteExpo->getValidate();
        
        if ($checkValidate === 1){
            
        $inviteExpo->setValidate(2);
        $em->merge($inviteExpo);
        $em->flush($inviteExpo);
        return new Response('switch to 2');
        
        }else if ($checkValidate === 2){
            
        $inviteExpo->setValidate(1);
        $em->merge($inviteExpo);
        $em->flush($inviteExpo);
        return new Response('switch to 1');
        }
        return new Response('ok');
    }

    /**
     * @Route("/get/expo/{id}/invite")
     */
    public function getExpoInvite($id) {

        $this->get('session')->remove('expoSession');
        $em = $this->getDoctrine()->getManager();
        $userId = $this->getUser()->getId();
        $expo = $em->getRepository(Exposition::class)->find($id);
        $expoArtiste = $expo->getfk_UserArtiste()->getId();
        $expoHote = $expo->getfk_UserHote()->getId();

        if ($expoArtiste == $userId or $expoHote == $userId){
        $this->get('session')->remove('expoSession');
        $this->get('session')->set('expoSession', $expo);
            
        }
        else {
        $this->get('session')->remove('expoSession');
            echo("non");
            return $this->redirectToRoute('accueilTest');

        }

        return $this->render("expo/invitation.html.twig", array("listesSerieExpo" => $expo));
    }

    
     /**
     * Retourne le Nombre de nouvelles invite
     * @Route("/get/new/invite")
     */
    public function getNewInvite() {
        $nbr = 0;
        $userId = $this->getUser()->getId();
        $check = array('validate' => 0, 'guest' => $userId);
        $newInvite = $this->getDoctrine()->getRepository(Demande_expo::class)->findBy($check);

        for ($i = 0; $i < count($newInvite); $i++) {
            $nbr = $nbr + 1;
        }

        return new JsonResponse($nbr);
    }
    
    
    /**
     * @Route("/join/expo/{id}")
     */
    public function joinExpo($id){
        $em = $this->getDoctrine()->getManager();
        $user = $this->getUser();
        $expo = $em->getRepository(Exposition::class)->find($id);
        

        $guest = $em->getRepository(User::class)->find($user);

        $check = array("guest" => $guest, "expo" => $expo);
        $checkDemande = $em->getRepository(Demande_expo::class)->findBy($check);

        if ($checkDemande == null) {
            $demande = new Demande_expo();
            $demande->setExpo($expo);
            $demande->setGuest($guest);
            $demande->setValidate(3);

            $em->persist($demande);
            $em->flush($demande);
        } else {

            return new Response('Déjà invité');
        }
        return new Response('ok');
    }
    
}
