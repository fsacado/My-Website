<?php

namespace AppBundle\Controller;

use Symfony\Component\Form\FormTypeInterface;
use AppBundle\Form\ContactType;
use Doctrine\DBAL\Types\TextType;
//use Service\Mailer;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Request;

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


        $defaultData = array('message' => 'Type your message here');

        $form = $this->createFormBuilder($defaultData)
            ->add('name', TextType::class)
            ->add('email', EmailType::class)
            ->add('question',TextType::class)
            ->getForm();

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

//    public function contactAction(Request $request)
//    {
////        $defaultData = array('message' => 'Type your message please');
////        $form = $this->createFormBuilder($defaultData)
////            ->add('name', TextType::class, array('label' => 'Your name', 'attr' => array('class' => 'length')))
////            ->add('email', EmailType::class, array('label' => 'Your email', 'attr' => array('class' => 'length')))
////            ->add('message', TextType::class, array('required' => false, 'label' => 'Your message', 'attr' => array('class' => 'length')))
////            ->add('send', SubmitType::class)
////            ->getForm();
////
////        $form->handleRequest($request);
////
////        if ($form->isSubmitted() && $form->isValid()) {
////            // data is an array with "name", "email", and "message" keys
////            $data = $form->getData();
////        }
//
//        return $this->render('contact/index.html.twig', [
//           'form' => $form,
//        ]);
//    }
}
