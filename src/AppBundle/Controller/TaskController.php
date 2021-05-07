<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Task;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class TaskController extends Controller
{
    /**
     * @Route("/post-task", name="post-task")
     */
    public function createAction(Request $request)
    {   $task = new Task();
        $form = $this->createFormBuilder($task)
          ->add('name', TextType::class)
          ->add('category', TextType::class)
          ->add('location', TextType::class)
          ->add('min_price', IntegerType::class)
          ->add('max_price', IntegerType::class)
          ->add('type_project', ChoiceType::class, array(
            'choices' => array(
                'Fixed Price Project' => 'Fixed Project',
                'Hourly Project' => 'Hourly Rate',
            ),
            'expanded' => true,
            'multiple' => false,
            
            
        ))
          ->add('description', TextareaType::class)
          ->add('save', SubmitType::class, array('label' => 'Post a task'))
          ->getForm();

        
        $form->handleRequest($request);
      
        if ($form->isSubmitted()) {
      
          $task = $form->getData();
      
          if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();

           // Associate User Entity To Task
            $user = $this->container->get('security.token_storage')->getToken()->getUser();
            $task->setUser($user);

            $em->persist($task);
            $em->flush();
      
          return $this->redirect('manage-tasks');
          }
        }
      
       
        return $this->render('AppBundle:Dashboard:post-task.html.twig', array(
            'entity' => $task,
            'form' => $form->createView()
        ));
    }

    /**
     * @Route("/manage-tasks", name="manage-tasks")
     */
    public function showAction()
    {   $user = $this->container->get('security.token_storage')->getToken()->getUser();
        $tasks = $this->getDoctrine()
        ->getRepository('AppBundle:Task')
        ->findBy(array('user'=> $user), array());

        return $this->render('AppBundle:Dashboard:manage-tasks.html.twig', array(
            'tasks' => $tasks
        ));
    }

    /**
     * @Route("/update-task/{id}")
     */
    public function updateAction(Request $request, $id)
    {   $em = $this->getDoctrine()->getManager();
        $task = $em->getRepository('AppBundle:Task')->find($id);
    
        
    
        $form = $this->createFormBuilder($task)
          ->add('name', TextType::class)
          ->add('category', TextType::class)
          ->add('location', TextType::class)
          ->add('min_price', IntegerType::class)
          ->add('max_price', IntegerType::class)
          ->add('type_project', ChoiceType::class, array(
            'choices' => array(
                'Fixed Price Project' => 'Fixed Project',
                'Hourly Project' => 'Hourly Rate',
            ),
            'expanded' => true,
            'multiple' => false,
            'disabled' => false,
            
        ))
          ->add('description', TextareaType::class)
          ->add('save', SubmitType::class, array('label' => 'Modify'))
          ->getForm();
          $form->handleRequest($request);
    
          if ($form->isSubmitted()) {
      
                  $job = $form->getData();
                  $em->flush();
              
                  return $this->redirect('/manage-tasks');
      
          }
      

        return $this->render('AppBundle:Dashboard:post-task.html.twig', array(
            'form' => $form->createView()
        ));
    }

    /**
     * @Route("/delete-task/{id}")
     */
    public function deleteAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $task = $em->getRepository('AppBundle:Task')->find($id);
    
        if (!$task) {
        throw $this->createNotFoundException(
        'There are no tasks with the following id: ' . $id
        );
        }
    
        $em->remove($task);
        $em->flush();
    
        return $this->redirect('/manage-tasks');
    
    }

}
