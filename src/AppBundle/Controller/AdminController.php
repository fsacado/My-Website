<?php
/**
 * Created by PhpStorm.
 * User: wilder12
 * Date: 1/23/18
 * Time: 4:51 PM
 */

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class AdminController extends Controller
{
    /**
     * @Route("/admin", name="home_admin")
     */
    public function indexAction(Request $request)
    {
        return $this->render('home-admin/index.html.twig');
    }
}