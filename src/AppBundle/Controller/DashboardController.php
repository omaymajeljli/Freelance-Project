<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class DashboardController extends Controller
{
    /**
     * @Route("/job" ,name="job")
     */
    public function jobAction()
    {
        return $this->render('AppBundle:Dashboard:job.html.twig', array(
            // ...
        ));
    }

}
