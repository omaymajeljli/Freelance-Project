<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class EmployerController extends Controller
{
    /**
     * @Route("/freelancer", name="freelancer")
     */
    public function showAction()
    {  
        $query = $this->getDoctrine()->getEntityManager()
        ->createQuery(
            'SELECT u FROM AppBundle:User u WHERE u.roles LIKE :role'
        )->setParameter('role', '%"ROLE_FREELANCER"%');

        $users = $query->getResult();
        return $this->render('AppBundle:Freelancer:show.html.twig', array(
            'users'=>$users
        ));
    }

   

}
