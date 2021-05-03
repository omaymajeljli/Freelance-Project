<?php


namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use FOS\UserBundle\Form\Type\ProfileFormType as BaseProfileFormType;

class ProfileFormType extends AbstractType
{
   
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
    }
    public function getParent()
    {
       return BaseProfileFormType::class;

   }
   public function getBlockPrefix()
   {
       return 'app_user_profile';
   }

  
}