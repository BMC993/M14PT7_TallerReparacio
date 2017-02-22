<?php

namespace TallerReparacio\FrontendBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use TallerReparacions\BackendBundle\Entity\Usuaris;
use Symfony\Component\HttpFoundation\Request;

class LoginController extends Controller
{
    public function formLoginAction()
    {
        return $this->render('TallerReparacioFrontendBundle:Default:formLogin.html.twig');
    }

    public function loginAction(Request $request)
    {
        if($request != null){
            $username = $request->request->get('username');
            $password = $request->request->get('password');

        $usuaris = $this->getDoctrine()->getRepository('TallerReparacioBackendBundle:Usuaris')->findAll();

        $trobat = findOneBy($usuaris(
            'nom' => $username, 
            'password' => $password))
        }

        if($trobat != null){
            return $this->render('TallerReparacioBackendBundle:Default:loginSatisfactori.html.twig', array(
                'titol' => 'Benvingut',
                'usuari' => $username));
        }else{
            return $this->render('TallerReparacioFrontendBundle:Default:loginIncorrecte.html.twig', array(
                'titol' => 'Ops!'));
        }
        /* return $this->render('TallerReparacioFrontendBundle:Default:formLogin.html.twig') */;
    }
}