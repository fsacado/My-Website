<?php
/**
 * Created by PhpStorm.
 * User: wilder12
 * Date: 01/02/18
 * Time: 11:42
 */

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ContactType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function contactAction(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add(TextType::class, array('label' => 'Your name', 'attr' => array('class' => 'length')))
            ->add( EmailType::class, array('label' => 'Your email', 'attr' => array('class' => 'length')))
            ->add(TextType::class, array('required' => false, 'label' => 'Your message', 'attr' => array('class' => 'length')));
    }
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {

    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_contact';
    }
}