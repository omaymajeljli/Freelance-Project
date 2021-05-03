<?php
namespace AppBundle\Form;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\CallbackTransformer;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use FOS\UserBundle\Form\Type\RegistrationFormType as BaseRegistrationFormType;


class RegistrationFormType extends AbstractType{

    public function buildForm(FormBuilderInterface $builder, array $options)
    { $builder
        ->add('roles', ChoiceType::class, array(
            'choices' => array(
                'Freelancer' => 'ROLE_FREELANCER',
                'Employer' => 'ROLE_EMPLOYER',
            ),
            'expanded' => true,
            'multiple' => false,
            'disabled' => false,
        ))
        ;
        //roles field data transformer
        $builder->get('roles')
        ->addModelTransformer(new CallbackTransformer(
            function ($rolesArray) {
                // transform the array to a string
                return count($rolesArray)? $rolesArray[0]: null;
            },
            function ($rolesString) {
                // transform the string back to an array
                return [$rolesString];
            }
        ));
    }
    public function getParent()
    {
        return BaseRegistrationFormType::class;
    }
}