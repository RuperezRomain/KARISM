<?php

namespace AppBundle\Form;

use AppBundle\Entity\Place;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PlaceFormType extends AbstractType {

    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder->add('size')
//                ->add('img',FileType::class,array('data_class'=> null))
        ->add('capacity')
        ->add('adress')
        ->add('fk_placetype')
        ->add('fk_city')
        ->add('availableStart', DateTimeType::class)
        ->add('availableEnd', DateTimeType::class)
        ->add('img', FileType::class, array('data_class' => null, 'required' => false));
    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver) {
        $resolver->setDefaults(array(
            'data_class' => Place::class,
        ));
    }

}
