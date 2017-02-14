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

        return $this->render('TallerReparacioFrontendBundle:Default:historic.html.twig', array(
            'titol' => 'Llistat de CLIEEEEEEEEEEEEEEEEEEEENTS',
            'clients' => $clients));
    }

    public function  formAfegirClientAction(){
        return $this->render('TallerReparacioBackendBundle:Default:formAfegirClient.html.twig');
    }

    public function eliminarAction($nif) {
 
 
        //Entity Manager
        $em = $this->getDoctrine()->getEntityManager();
        $posts = $em->getRepository("BackendBundle:Clients");
 
        $post = $posts->find($nif);
        $em->remove($post);
        $flush=$em->flush();
 
        if ($flush == null) {
            echo "Client eliminat correctament";
        } else {
            echo "El client no s'ha borrat";
        }
 
 
        die();
    }

    public function afegirClientAction(Request $request) {
        // crea una categoria y le asigna algunos datos ficticios para este ejemplo
        $em = $this->getDoctrine()->getManager();
        $Clients= new Clients();
        $Vehicles = new Vehicles();
        // $category->setName('tato');
        
        var_dump("expression");
        if($request != null){
            var_dump("Haey");
            $Clients->setNIF($request->request->get('nif'));
            $Clients->setNom($request->request->get('nom'));
            $Clients->setCognom($request->request->get('cognom'));
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
            'name' => $Clients->getNom()));
        }
    } 

}

