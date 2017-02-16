<?php

namespace TallerReparacio\BackendBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use TallerReparacio\BackendBundle\Entity\Clients;
use TallerReparacio\BackendBundle\Entity\Vehicles;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class VehiclesController extends Controller
{
    public function indexAction()
    {
        return $this->render('TallerReparacioBackendBundle:Default:index.html.twig');
    }

    public function mostrarAction()
    {
        $vehicles = $this->getDoctrine()->getRepository('TallerReparacioBackendBundle:Vehicles')->findAll();

        return $this->render('TallerReparacioBackendBundle:Default:vehicles.html.twig', array(
            'titol' => 'Llistat de vehicles',
            'vehicles' => $vehicles));
    }

    public function formEditarVehicleAction($matricula)
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

    public function editarVehicleAction(Request $request)
    {
        if($request != null){

            $matricula = $request->request->get('matricula');

            $em = $this->getDoctrine()->getManager();
            $vehicle = $em->getRepository('TallerReparacioBackendBundle:Vehicles')->findOneBymatricula($matricula);

            $marca = $request->request->get('marca');
            $model = $request->request->get('model');
            $tipusCombustible = $request->request->get('tipusCombustible');

            $vehicle->setMarca($marca);
            $vehicle->setModel($model);
            $vehicle->setTipusCombustible($tipusCombustible);

        }

        $em->flush();

        return $this->render('TallerReparacioBackendBundle:Default:vehicleAdded.html.twig', array(
        'titol' => 'Vehicle editat correctament!',
        'vehicle' => $vehicle));
    }

    public function eliminarAction($matricula)
    {
        $em = $this->getDoctrine()->getManager();
        $vehicle = $em->getRepository('TallerReparacioBackendBundle:Vehicles')->findOneBymatricula($matricula);

        if (!$vehicle) {
            throw $this->createNotFoundException(
                'No existeix el vehicle amb la matricula: '.$matricula
            );
        }
        $em->remove($vehicle);
        $em->flush();

        return $this->redirectToRoute('taller_reparacio_backend_consultar_vehicles');
    }
}

