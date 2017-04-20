<?php

namespace AppBundle\Form;

use AppBundle\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class UserType extends AbstractType {

    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder
                ->add('email', EmailType::class)
                ->add('username', TextType::class)
                ->add('password', RepeatedType::class, array(
                    'type' => PasswordType::class,
                    'first_options' => array('label' => 'Password'),
                    'second_options' => array('label' => 'Repeat Password'),
                ))
                ->add('genre', ChoiceType::class, array(
                    'choices' => array(
                        'Homme' => 'Homme',
                        'Femme' => 'Femme'
                    ),
                    'required' => false,
                    'placeholder' => 'Choose your gender',
                    'empty_data' => null
                ))
                ->add('firstname', TextType::class, array('required' => false))
                ->add('lastname', TextType::class, array('required' => false))
                ->add('phone', TextType::class, array('required' => false))
                ->add('bio', TextType::class, array('required' => false))
                ->add('adress', TextType::class, array('required' => false))

        ;
    }

    public function configureOptions(OptionsResolver $resolver) {
        $resolver->setDefaults(array(
            'data_class' => User::class,
        ));
    }

}
