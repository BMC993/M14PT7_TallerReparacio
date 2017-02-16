<?php

namespace TallerReparacio\BackendBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use TallerReparacio\BackendBundle\Entity\Clients;
use TallerReparacio\BackendBundle\Entity\Vehicles;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class ClientsController extends Controller
{
    public function indexAction()
    {
        return $this->render('TallerReparacioBackendBundle:Default:index.html.twig');
    }

    public function mostrarAction()
    {
        $clients = $this->getDoctrine()->getRepository('TallerReparacioBackendBundle:Clients')->findAll();

        return $this->render('TallerReparacioBackendBundle:Default:clients.html.twig', array(
            'titol' => 'Llistat de clients',
            'clients' => $clients));
    }

    public function formEditarClientAction($nif)
    {
        $em = $this->getDoctrine()->getManager();
        $client = $em->getRepository('TallerReparacioBackendBundle:Clients')->findOneByNIF($nif);

        if (!$client) {
            throw $this->createNotFoundException(
                'No existeix el client amb el nif: '.$nif
            );
        }

        return $this->render('TallerReparacioBackendBundle:Default:formEditarClient.html.twig', array(
            'titol' => 'Editar client',
            'client' => $client));
    }

    public function editarClientAction(Request $request)
    {
        if($request != null){

            $nif = $request->request->get('nif');

            $em = $this->getDoctrine()->getManager();
            $client = $em->getRepository('TallerReparacioBackendBundle:Clients')->findOneByNIF($nif);

            $cognom = $request->request->get('cognom');
            $nom = $request->request->get('nom');
            $foto = $request->request->get('foto');

            $client->setNom($nom);
            $client->setCognom($cognom);
            $client->setFoto($foto);

        }

        $em->flush();

        return $this->render('TallerReparacioBackendBundle:Default:clientAdded.html.twig', array(
        'titol' => 'Client editat correctament!',
        'client' => $client));
    }

    public function eliminarAction($nif)
    {
        $em = $this->getDoctrine()->getManager();
        $client = $em->getRepository('TallerReparacioBackendBundle:Clients')->findOneByNIF($nif);

        if (!$client) {
            throw $this->createNotFoundException(
                'No existeix el client amb el nif: '.$nif
            );
        }
        $em->remove($client);
        $em->flush();

        return $this->redirectToRoute('taller_reparacio_backend_consultar_clients');
    }

    public function formAfegirClientAction()
    {
        return $this->render('TallerReparacioBackendBundle:Default:formAfegirClient.html.twig');
    }

    public function afegirClientAction(Request $request)
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
            'titol' => 'Nou client afegit',
            'client' => $Clients));
        }
    } 
}

