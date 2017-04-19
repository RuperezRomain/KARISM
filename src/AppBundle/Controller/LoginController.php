<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Config\Definition\Exception\Exception;

class LoginController extends Controller
{
    
    /**
     * @Route("/login", name="login")
     */
    public function loginAction() {

        return $this->render('default/login.html.twig');
    }    
    
    /**
     * @Route("/logout", name="logout")
     * @throws Exception
     */
    public function logout(){
        //there is nothing here .......
    }
    
    /**
     * @Route("/loginCheck", name="loginCheck")
     * @throws Exception
     */
    public function loginCheck(){
    }
}
