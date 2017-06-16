<?php

namespace ReservationBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\VarDumper\VarDumper;

class ReservationController extends Controller
{
    public function indexAction()
    {
        $ressources = $this->get('cba.service.ressource')->getAll();
        $users = $this->get('cba.service.user')->getAll();

        return $this->render('ReservationBundle::index.html.twig', [
            'users' => $users,
            'ressources' => $ressources
        ]);
    }

    public function reservationUpdateAction(Request $request){
        $userId = $request->get('userId');

        if(!$userId || $userId == 'null'){
            $user = null;
        }else{
            $user = $this->get('cba.service.user')->findOneOr404($userId);
        }

        $ressource = $this->get('cba.service.ressource')->findOneOr404($request->get('ressourceId'));

        $ressource->setUser($user);

        $em = $this->getDoctrine()->getManager();
        $em->flush();

        return new JsonResponse('', 200);
    }
}
