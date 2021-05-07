<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Job;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;



class JobController extends Controller
{
    /**
     * @Route("/post-job" ,name="post-job")
     */
    public function createAction(Request $request)
    {
        $job = new Job();
        $form = $this->createFormBuilder($job)
          ->add('title', TextType::class)
          ->add('type', TextType::class)
          ->add('category', TextType::class)
          ->add('location', TextType::class)
          ->add('salary', TextType::class)
          ->add('description', TextareaType::class)
          ->add('save', SubmitType::class, array('label' => 'Post a job'))
          ->getForm();

        
        $form->handleRequest($request);
      
        if ($form->isSubmitted()) {
      
          $job = $form->getData();
      
          if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();

           // Associate User Entity To Product 
            $user = $this->container->get('security.token_storage')->getToken()->getUser();
            $job->setUser($user);

            $em->persist($job);
            $em->flush();
      
          return $this->redirect('manage-jobs');
          }
        }
      
        return $this->render('AppBundle:Dashboard:post-job.html.twig', array(
            'entity' => $job,
            'form' => $form->createView()
           
        ));
    }

    /**
     * @Route("/manage-jobs", name="manage-jobs")
     */
    public function showAction()
    {   $user = $this->container->get('security.token_storage')->getToken()->getUser();
        $jobs = $this->getDoctrine()
        ->getRepository('AppBundle:Job')
        ->findBy(array('user'=> $user), array());

        
    
     return $this->render('AppBundle:Dashboard:manage-jobs.html.twig', array(
        'jobs' => $jobs
           
        ));
    }
    /**
    * @Route("/update-job/{id}" )
    */  
    public function updateAction(Request $request, $id) {

        $em = $this->getDoctrine()->getManager();
        $job = $em->getRepository('AppBundle:Job')->find($id);
    
        
    
        $form = $this->createFormBuilder($job)
          ->add('title', TextType::class)
          ->add('type', TextType::class)
          ->add('category', TextType::class)
          ->add('location', TextType::class)
          ->add('salary', TextType::class)
          ->add('description', TextareaType::class)
          ->add('save', SubmitType::class, array('label' => 'Modify'))
          ->getForm();
    
        $form->handleRequest($request);
    
        if ($form->isSubmitted()) {
    
                $job = $form->getData();
                $em->flush();
            
                return $this->redirect('/manage-jobs');
    
        }
    
        return $this->render(
        'AppBundle:Dashboard:post-job.html.twig',
        array('form' => $form->createView())
        );
    
    }


    /**
        * @Route("/delete-job/{id}")
    */ 
    public function deleteAction($id) {

        $em = $this->getDoctrine()->getManager();
        $job = $em->getRepository('AppBundle:Job')->find($id);
    
        if (!$job) {
        throw $this->createNotFoundException(
        'There are no jobs with the following id: ' . $id
        );
        }
    
        $em->remove($job);
        $em->flush();
    
        return $this->redirect('/manage-jobs');
    
    }

}
