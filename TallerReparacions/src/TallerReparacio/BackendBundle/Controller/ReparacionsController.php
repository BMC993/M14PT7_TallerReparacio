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
        $Clients= new Clients();
        $Vehicles = new Vehicles();
        // $category->setName('tato');
        
        if($request != null){
            $Clients->setNIF($request->request->get('nif'));
            $Clients->setNom($request->request->get('nom'));
            $Clients->setCognom($request->request->get('cognom'));
            $Clients->setFoto($request->request->get('foto'));
            $Vehicles->setMatricula($request->request->get('matricula'));
            $Vehicles->setMarca($request->request->get('marca'));
            $Vehicles->setModel($request->request->get('model'));
            $Vehicles->setTipusCombustible($request->request->get('tipusCombustible'));
            $Clients->setVehicle($Vehicles);

            // ... perform some action, such as saving the task to the database
            // for example, if Category is a Doctrine entity, save it!
            
            $em->persist($Clients);
            $em->persist($Vehicles);
            $em->flush();

            return $this->render('TallerReparacioBackendBundle:Default:clientAdded.html.twig', array(
            'titol' => 'Nou vehicle i client afegit',
            'client' => $Clients,
            'vehicle' => $Vehicles));
        }
    } 
}

