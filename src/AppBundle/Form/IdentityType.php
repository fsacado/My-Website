<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class IdentityType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('title', TextType::class, array('label' => 'Titre', 'attr' => array('class' => 'length')))
                ->add('description', TextType::class, array('label' => 'Description', 'attr' => array('class' => 'length')))
                ->add('imageFile', FileType::class, array('required' => false, 'label' => 'Image', 'attr' => array('class' => 'length')))
                ->add('linkedin', TextType::class, array('label' => 'Linkedin', 'attr' => array('class' => 'length')))
                ->add('linkedinImageFile', FileType::class, array('required' => false, 'label' => 'Image Linkedin', 'attr' => array('class' => 'length')))
                ->add('github', TextType::class, array('label' => 'Github', 'attr' => array('class' => 'length')))
                ->add('githubImageFile', FileType::class, array('required' => false, 'label' => 'Image Github', 'attr' => array('class' => 'length')));
    }/**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Identity'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_identity';
    }


}
