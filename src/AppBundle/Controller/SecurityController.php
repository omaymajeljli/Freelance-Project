<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class SecurityController extends Controller
{
    /**
     * @Route("/add")
     */
    public function addAction()
    {
        return $this->render('AppBundle:Security:add.html.twig', array(
            // ...
        ));
    }

    /**
     * @Route("/home")
     */
    public function redirectAction()
    {
        $authChecker = $this->container->get('security.authorization_checker');
        if($authChecker->isGranted('ROLE_FREELANCER')){
            return $this->render('AppBundle:Freelancer:profile.html.twig');
        }
        else if ($authChecker->isGranted('ROLE_EMPLOYER')){
            return $this->render('AppBundle:Employer:profile.html.twig');
        } else{
        return $this->render('@FOSUser/Security/login_content.html.twig', array(
                // ...
            
        ));}
    }

}
