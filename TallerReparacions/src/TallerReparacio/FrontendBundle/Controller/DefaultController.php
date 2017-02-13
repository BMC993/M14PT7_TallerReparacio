<?php

namespace TallerReparacio\FrontendBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use TallerReparacions\BackendBundle\Entity\Clients;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('TallerReparacioFrontendBundle:Default:index.html.twig');
    }

    public function historicAction()
    {
        $clients = $this->getDoctrine()->getRepository('TallerReparacioBackendBundle:Clients')->findAll();

        return $this->render('TallerReparacioFrontendBundle:Default:historic.html.twig', array(
            'titol' => 'Llistat de CLIEEEEEEEEEEEEEEEEEEEENTS',
            'clients' => $clients));
    }

}