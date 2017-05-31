<?php

namespace AppBundle\Form;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PictureType extends AbstractType {

    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder->add('nom')
                ->add('img', FileType::class, array('data_class' => null))
                ->add('style', EntityType::class, array(
                    'class' => 'AppBundle:Style',
                    'choice_label' => 'name',
                    'multiple' => true,
                    'expanded' => true,
                    ))
                ->add('genre', EntityType::class, array(
                    'class' => 'AppBundle:Genre',
                    'choice_label' => 'name',
                    'multiple' => true,
                    'expanded' => true,
                    ))
                ->add('technique', EntityType::class, array(
                    'class' => 'AppBundle:Technique',
                    'choice_label' => 'name',
                    'multiple' => true,
                    'expanded' => true,
                    ))
                ->add('size')
                ->add('prix')
//                ->add('expos')
                ->add('commentaire', TextareaType::class);
    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver) {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Picture'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix() {
        return 'appbundle_picture';
    }

}
