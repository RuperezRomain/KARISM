<?php

namespace AppBundle\Controller;

use AppBundle\AppBundle;
use AppBundle\Entity\User;
use AppBundle\Form\UserType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Config\Definition\Exception\Exception;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

class LoginController extends Controller
{
    
    /**
     * @Route("/login", name="login")
     */
    public function loginAction() {
    $authenticationUtils = $this->get('security.authentication_utils');

    // get the login error if there is one
    $error = $authenticationUtils->getLastAuthenticationError();

    // last username entered by the user
    $lastUsername = $authenticationUtils->getLastUsername();
    $usercourant = $this->getUser();

    return $this->render('default/login.html.twig', array(
        'last_username' => $lastUsername,
        'error'         => $error,
        'usercourant'         => $usercourant,
    ));

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
    
    /**
     * @Route("/register", name="register")
     */
    public function registerAction(Request $request)
    {
        //build the form
        $user = new User();
        $form = $this->createForm(UserType::class, $user);

        //handle the submit
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            //Recupertation de l'object role 
            $em = $this->getDoctrine()->getManager();
            $roleUser = $em->getRepository("AppBundle:Role")->findByRole("ROLE_USER");
if ($form->get('profilPicture')->getData() !== null) {
            $nomDuFichier = md5(uniqid()) . '.' . $user->getProfilPicture()->getClientOriginalExtension();
            $user->getProfilPicture()->move('../web/images/profilPictures', $nomDuFichier);
            $user->setProfilPicture($nomDuFichier);
                } else {
                    $placeholder = 'placeholder.png';
                    $user->setProfilPicture($placeholder);
                }

            
            //Encode the password
            $password = $this->get('security.password_encoder')
                ->encodePassword($user, $user->getPassword());
            $user->setPassword($password);
            $user->setRoles($roleUser);
            $user->setArtistValidate(null);
            $user->setHoteValidate(null);

            //save the User
            $em = $this->getDoctrine()->getManager();
            $em->persist($user);
            $em->flush();

            return $this->redirectToRoute('accueilTest');
        }

        return $this->render(
            'default/register.html.twig',
            array('form' => $form->createView())
        );
    }
    
    
}
