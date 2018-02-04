<?php

namespace AppBundle\Controller;

use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
//use Service\Mailer;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormTypeInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class HomeController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $identity = $em->getRepository('AppBundle:Identity')->findOneById(1);
        $projects = $em->getRepository('AppBundle:Project')->findAll();

        $form = $this->formAction($request);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // data is an array with "name", "email", and "message" keys
            $data = $form->getData();
        }

        return $this->render('home/index.html.twig', array(
            'identity' => $identity,
            'projects' => $projects,
            'form' => $form->createView(),
        ));
    }

    // Creating view for form
    public function formAction(Request $request)
    {
        $defaultData = array('message' => 'Type your message here');

        $form = $this->createFormBuilder($defaultData)
            ->add('name', TextType::class, array('attr' => array('class' => 'form-input'),
            'label_attr' => array('class' => 'label-form' )), array('label' => 'Your name', 'constraints' => array(
              new NotBlank(),
            )))
            ->add('email', EmailType::class, array('attr' => array('class' => 'form-input'),
            'label_attr' => array('class' => 'label-form')), array('label' => 'Your email', 'constraints' => array(
              new NotBlank(),
              new Length(array('min' => 8)),
            )))
            ->add('question',TextareaType::class, array('attr' => array('class' => 'form-input'),
            'label_attr' => array('class' => 'label-form')), array('label' => 'Your question', 'constraints' => array(
              new NotBlank(),
              new Length(array('min' => 20))
            )))
            ->getForm();

            return $form;
    }

    //    public function formAction($name)
    //    {
    //        $message = \Swift_Message::newInstance()
    //            ->setSubject('Hello Email')
    //            ->setFrom('send@example.com')
    //            ->setTo('loann.meignant@hotmail.fr')
    //            ->setBody(
    //                $this->renderView(
    //                    'email/layout.html.twig',
    //                    array('name' => $name)
    //                ),
    //                'text/html'
    //            );
    //        $this->get('mailer')->send($message);
    //
    //        return $this->render('home/index.html.twig');
    //    }
}
