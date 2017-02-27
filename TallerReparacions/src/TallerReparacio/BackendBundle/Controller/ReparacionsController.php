<?php

namespace TallerReparacio\BackendBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use TallerReparacio\BackendBundle\Entity\Clients;
use TallerReparacio\BackendBundle\Entity\Vehicles;
use TallerReparacio\BackendBundle\Entity\Reparacions;
use TallerReparacio\BackendBundle\Entity\Realitzades;
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
        $em = $this->getDoctrine()->getManager();
        $Reparacions = new Reparacions();
        $Realitzades = new Realitzades();

        $codiReparacio = $request->request->get('codi');
        $descripcio = $request->request->get('descripcio');
        $dataEntrada = $request->request->get('dataEntrada');
        $dataSortida = $request->request->get('dataSortida');
        $horesDedicades = $request->request->get('horesDedicades');
        $matriculaVehicle = $request->request->get('matriculaVehicle');

        if($request != null){

            if ($codiReparacio != '' && $descripcio != '' && $dataEntrada != '' && $dataSortida != '' && $horesDedicades != '' && $matriculaVehicle != '') {



                //$Reparacions->setCodi($request->request->get('codi'));
                //$Reparacions->setDescripcio($request->request->get('descripcio'));


                $Reparacions->setCodi($codiReparacio);
                $Reparacions->setDescripcio($descripcio);
                $Realitzades->setDataentrada(new \DateTime($dataEntrada));
                $Realitzades->setDatasortida(new \DateTime($dataSortida));
                $Realitzades->setHoresdedicades($horesDedicades);
                //$Realitzades->setVehicleMatricula($matriculaVehicle);

                $ok = true;

                $em->persist($Reparacions);
                $em->persist($Realitzades);
                $em->flush();

            } else {
                $ok = false;
            }

            if ($ok) {
                return $this->render('TallerReparacioBackendBundle:Default:reparacioAdded.html.twig', array(
                    'titol' => 'Reparació creada!',
                    'reparacio' => $Reparacions,
                    'realitzades' => $Realitzades));
            } else {
                return $this->render('TallerReparacioBackendBundle:Default:reparacioNotAdded.html.twig', array(
                    'titol' => 'No has introduït les dades correctament'));

            }
        }
    }

    public function formEditarReparacioAction($codi)
    {
        $em = $this->getDoctrine()->getManager();
        $reparacio = $em->getRepository('TallerReparacioBackendBundle:Reparacions')->findOneBycodi($codi);

        if (!$reparacio) {
            throw $this->createNotFoundException(
                'No existeix la reparacio amb el codi: '.$codi
                );
        }

        return $this->render('TallerReparacioBackendBundle:Default:formEditarReparacio.html.twig', array(
            'titol' => 'Editar reparacio',
            'reparacio' => $reparacio));
    }

    public function editarReparacioAction(Request $request)
    {
        if($request != null){

            $codi = $request->request->get('codi');

            $em = $this->getDoctrine()->getManager();
            $reparacio = $em->getRepository('TallerReparacioBackendBundle:Reparacions')->findOneBycodi($codi);

            $descripcio = $request->request->get('descripcio');
            //$model = $request->request->get('model');
            //$tipusCombustible = $request->request->get('tipusCombustible');

            if ($descripcio != '') {
                $reparacio->setDescripcio($descripcio);
                $ok = true;
            } else {
                $ok = false;
            }

            $em->flush();

            if ($ok) {
                return $this->render('TallerReparacioBackendBundle:Default:reparacioAdded.html.twig', array(
                    'titol' => 'Reparació editada correctament!',
                    'reparacio' => $reparacio));
            } else {
                return $this->render('TallerReparacioBackendBundle:Default:reparacioAdded.html.twig', array(
                    'titol' => 'No has editat la reparació correctament...',
                    'reparacio' => $reparacio));
            }
        }
    }

    public function eliminarAction($codi)
    {
        $em = $this->getDoctrine()->getManager();
        $reparacio = $em->getRepository('TallerReparacioBackendBundle:Reparacions')->findOneBycodi($codi);

        if (!$reparacio) {
            throw $this->createNotFoundException(
                'No existeix la reparació amb el codi: '.$codi
                );
        }
        $em->remove($reparacio);
        $em->flush();

        return $this->redirectToRoute('taller_reparacio_backend_consultar_reparacions');
    }
}

