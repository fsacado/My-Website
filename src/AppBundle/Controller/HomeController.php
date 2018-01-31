<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
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


            $message = \Swift_Message::newInstance()
                ->setSubject('Hello Email')
                ->setFrom('loann.meignant@hotmail.fr')
                ->setTo(['loann.meignant@hotmail.fr'])
                ->setBody(
                    $this->renderView(
                        'email/layout.html.twig'),
                    'text/html'
                );
            $this->get('mailer')->send($message);


        return $this->render('home/index.html.twig', array(
            'identity' => $identity,
            'projects' => $projects,
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
}
