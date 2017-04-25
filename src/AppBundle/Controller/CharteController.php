<?php

/**
 * Gestion de la page Charte
 *
 * @package Kar:sm
 * @author Emilie Letailleur
 * @copyright 2017- Kar:sm
 *
 */

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Entity\Charte;

class CharteController extends Controller
{
    /**
     * @Route("/charte")
     */
    public function indexAction()
    {
        //appelle entity manager
        $em = $this->getDoctrine()->getManager();
        // Liste d'articles recup depuis la bdd en tenant compte de la position (ordre ascendant)
        $chartes = $em->getRepository('AppBundle:Charte')->findBy(array(), array('position'=>'asc'));
        // renvoie la vue sur twig
        return $this->render('default/charte.html.twig', array(
        'chartes' => $chartes,
    ));
    }
}
