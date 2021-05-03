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
            return $this->render("@FOSUser/Freelancer/Profile/show.html.twig");
        }
        else if ($authChecker->isGranted('ROLE_EMPLOYER')){
            return $this->render("@FOSUser/Employer/Profile/show_content.html.twig");
        } else{
        return $this->render('@FOSUser/Security/login_content.html.twig', array(
                // ...
            
        ));}
    }

}
