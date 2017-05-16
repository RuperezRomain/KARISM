<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Suggestion;
use AppBundle\Entity\SuggestionCat;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;


/**
 * Description of SuggestionController
 *
 * @author fflachet
 */
class SuggestionController extends Controller{
    
    /**
     * @Route("/suggestTypes")
     * @Method({"GET"})
     */
    public function getSuggestionTypes() {
        $types = $this->getDoctrine()->getRepository(SuggestionCat::class)->findAll();
        return new JsonResponse($types);
    }
    
    /**
     * @Route("/suggestStyles")
     * @Method({"GET"})
     */
    public function getSuggestionStyles() {
        $styles = $this->getDoctrine()->getRepository(Suggestion::class)->findByCategorie(1);
        return new JsonResponse($styles);
    }
    
    /**
     * @Route("/suggestTechs")
     * @Method({"GET"})
     */
    public function getSuggestionTechniques() {
        $techs = $this->getDoctrine()->getRepository(Suggestion::class)->findByCategorie(2);
        return new JsonResponse($techs);
    }
    
    /**
     * @Route("/suggestGenres")
     * @Method({"GET"})
     */
    public function getSuggestionGenres() {
        $genres = $this->getDoctrine()->getRepository(Suggestion::class)->findByCategorie(3);
        return new JsonResponse($genres);
    }
    
    /**
     * @Route("/suggestion")
     * @param Request $r
     */
    public function addSuggestion(Request $r) {
        
        $suggestion = new Suggestion();
        $doctrine = $this->getDoctrine();
        $suggestion->setName($r->get("name"));
        $categories = $doctrine->getRepository(SuggestionCat::class)->findByName($r->get("categorie"));
        
        $suggestion->setCategorie($categories[0]);
        
        $em = $doctrine->getManager();
        $em->persist($suggestion);
        $em->flush();
         
        return new JsonResponse(array("test"=>$suggestion->getId()));
        
    }
    
    
} 
