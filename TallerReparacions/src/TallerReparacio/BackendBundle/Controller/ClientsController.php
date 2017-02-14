<?php

namespace TallerReparacio\BackendBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use MusicShop\FrontendBundle\Entity\Clients;
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


    /* public function afegirClientAction(Request $request) {
        // crea una categoria y le asigna algunos datos ficticios para este ejemplo
        $Clients= new Clients();
        $Vehicles = new Vehicles();
        // $category->setName('tato');
 
        $form = $this->createFormBuilder($Clients) 
            ->add('nIF', TextType::class, array('label' => 'NIF'))
            ->add('nom', TextType::class, array('label' => 'Nom'))
            ->add('cognom', TextType::class, array('label' => 'Cognom'))
            ->add('matricula', TextType::class, array('label' => 'Matricula Cotxe'))
            ->add('marca', TextType::class, array('label' => 'Marca'))
            ->add('vehicle', TextType::class, array('label' => 'Vehicle'))
            ->add('model', TextType::class, array('label' => 'Model'))
            ->add('tipusCombustible', TextType::class, array('label' => 'Tipus Combustible'))
            ->add('save', SubmitType::class, array('label' => 'Crear Categoria'))
            ->getForm();

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // $form->getData() holds the submitted values
            // but, the original `$task` variable has also been updated
            $Clients->setNIF($form->getNIF())
            $Clients->setNom($form->getNom())
            $Clients->setCognom($form->getCognom())
            $Vehicles->setMatricula($form->getMatricula())
            $Vehicles->setMarca($form->getMarca())
            $Vehicles->setVehicle($form->getVehicle())
            $Vehicles->setModel($form->getModel())
            $Vehicles->setTipusCombustible($form->getTipusCombustible())


            // ... perform some action, such as saving the task to the database
            // for example, if Category is a Doctrine entity, save it!
            $em = $this->getDoctrine()->getManager();
            $em->persist($category);
            $em->flush();

            return $this->render('MusicShopBackendBundle:Default:categoryAdded.html.twig', array(
            'titol' => 'Nova categoria afegida',
            'name' => $category->getName()));
        }
 
        return $this->render('MusicShopBackendBundle:Default:addCategory.html.twig', array(
            'titol' => 'Afegir Categoria',
            'form' => $form->createView(),
        ));
    } */

}

