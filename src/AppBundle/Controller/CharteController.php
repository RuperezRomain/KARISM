<?php

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
        // récupère toutes les infos dans la table
        /*
        $chartes = $em->getRepository('AppBundle:Charte')->findAll();
        $titres = $em->getRepository('AppBundle:Charte')->findOneById(3);
        $contenus = $em->getRepository('AppBundle:Charte')->find(2);
        // renvoie la vue sur twig
        return $this->render('default/charte.html.twig', array(
            //enregistre les variables
            'chartes' => $chartes,
            'titres' => $titres,
            'contenus' => $contenus,
        ));*/

        // Liste d'articles recup depuis la bdd en tenant compte de la position (ordre ascendant)
        $chartes = $em->getRepository('AppBundle:Charte')->findBy(array(), array('position'=>'asc'));
        // Appel de la vue
        return $this->render('default/charte.html.twig', array(
        'chartes' => $chartes,
    ));
    }
}
