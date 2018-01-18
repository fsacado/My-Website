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

        return $this->render('home/index.html.twig', array(
            'identity' => $identity,
            'projects' => $projects,
        ));
    }
}
