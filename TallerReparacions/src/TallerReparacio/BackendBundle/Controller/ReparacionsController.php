<?php

namespace TallerReparacio\BackendBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use TallerReparacio\BackendBundle\Entity\Clients;
use TallerReparacio\BackendBundle\Entity\Vehicles;
use TallerReparacio\BackendBundle\Entity\Reparacions;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class ReparacionsController extends Controller
{
    public function indexAction()
    {
        return $this->render('TallerReparacioBackendBundle:Default:index.html.twig');
    }

    public function mostrarAction()
    {
        $reparacions = $this->getDoctrine()->getRepository('TallerReparacioBackendBundle:Reparacions')->findAll();

        return $this->render('TallerReparacioBackendBundle:Default:reparacions.html.twig', array(
            'titol' => 'Llistat de reparacions',
            'reparacions' => $reparacions));
    }

    public function formCrearReparacioAction()
    {
        $vehicles = $this->getDoctrine()->getRepository('TallerReparacioBackendBundle:Vehicles')->findAll();

        return $this->render('TallerReparacioBackendBundle:Default:formCrearReparacio.html.twig', array(
            'titol' => 'Crear Reparació',
            'vehicles' => $vehicles));
    }

    public function crearReparacioAction(Request $request)
    {
        // crea una categoria y le asigna algunos datos ficticios para este ejemplo
        $em = $this->getDoctrine()->getManager();
        $Reparacions = new Reparacions();
        //$Vehicles = new Vehicles();
        // $category->setName('tato');
        
        if($request != null){
            $Reparacions->setCodi($request->request->get('codi'));
            $Reparacions->setDescripcio($request->request->get('descripcio'));

            // ... perform some action, such as saving the task to the database
            // for example, if Category is a Doctrine entity, save it!
            
            $em->persist($Reparacions);
            $em->persist($Vehicles);
            $em->flush();

            return $this->render('TallerReparacioBackendBundle:Default:reparacioAdded.html.twig', array(
            'titol' => 'Reparació creada!',
            'reparacio' => $Reparacions,
            'vehicle' => $Vehicles));
        }
    } 
}

