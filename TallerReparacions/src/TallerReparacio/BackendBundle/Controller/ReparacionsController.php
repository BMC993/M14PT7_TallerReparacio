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

    public function formEditarVehicleAction($codi)
    {
        $em = $this->getDoctrine()->getManager();
        $vehicle = $em->getRepository('TallerReparacioBackendBundle:Vehicles')->findOneBymatricula($matricula);

        if (!$vehicle) {
            throw $this->createNotFoundException(
                'No existeix el vehicle amb la matricula: '.$matricula
            );
        }

        return $this->render('TallerReparacioBackendBundle:Default:formEditarVehicle.html.twig', array(
            'titol' => 'Editar vehicle',
            'vehicle' => $vehicle));
    }

    public function editarReparacioAction(Request $request)
    {
        if($request != null){

            $matricula = $request->request->get('matricula');

            $em = $this->getDoctrine()->getManager();
            $vehicle = $em->getRepository('TallerReparacioBackendBundle:Vehicles')->findOneBymatricula($matricula);

            $marca = $request->request->get('marca');
            $model = $request->request->get('model');
            $tipusCombustible = $request->request->get('tipusCombustible');

            if ($marca != '' && $model != '' && $tipusCombustible != '') {
                $vehicle->setMarca($marca);
                $vehicle->setModel($model);
                $vehicle->setTipusCombustible($tipusCombustible);
                $ok = true;
            } else {
                $ok = false;
            }

        }
    }
}

