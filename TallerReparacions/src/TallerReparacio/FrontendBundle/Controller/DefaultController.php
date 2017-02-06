<?php

namespace TallerReparacio\FrontendBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('TallerReparacioFrontendBundle:Default:index.html.twig');
    }
}
