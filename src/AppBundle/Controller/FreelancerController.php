<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class FreelancerController extends Controller
{
    /**
     * @Route("/showEmployer")
     */
    public function showEmployerAction()
    {
        return $this->render('AppBundle:Freelancer:show_employer.html.twig', array(
            // ...
        ));
    }

    /**
     * @Route("/showJob", name="showJob")
     */
    public function showJobAction()

    {    $jobs = $this->getDoctrine()
        ->getRepository('AppBundle:Job')
        ->findAll();
    
        return $this->render('AppBundle:Freelancer:show_job.html.twig', array(
            'jobs' => $jobs
        ));
    }

    /**
     * @Route("/showTask")
     */
    public function showTaskAction()
    {
        return $this->render('AppBundle:Freelancer:show_task.html.twig', array(
            // ...
        ));
    }

}
