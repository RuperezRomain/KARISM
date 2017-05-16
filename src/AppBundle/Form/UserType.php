<?php

namespace AppBundle\Form;

use AppBundle\Entity\User;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
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
                    'first_options' => array('label' => 'Password','required' => false),
                    'second_options' => array('label' => 'Repeat Password'),
                    'required' => false
                ))
                ->add('profilPicture',FileType::class,array('data_class'=> null,'required' => false))
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
                ->add('phone', IntegerType::class, array('required' => false))
                ->add('bio', TextareaType::class, array('required' => false))
                ->add('style', EntityType::class, array(
                    'class' => 'AppBundle:Style',
                    'choice_label' => 'name',
                    'multiple' => true,
                    'expanded' => true,
                    ))
                ->add('adress', TextType::class, array('required' => false))

        ;
    }

    public function configureOptions(OptionsResolver $resolver) {
        $resolver->setDefaults(array(
            'data_class' => User::class,
        ));
    }

}
