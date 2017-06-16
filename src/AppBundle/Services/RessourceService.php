<?php
namespace AppBundle\Services;

use Doctrine\ORM\EntityManager;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class RessourceService
{
    private $em;

    function __construct(EntityManager $em)
    {
        $this->em = $em;
    }

    public function getAll(){
        return $this->em->getRepository('AppBundle:Ressource')->findAll();
    }

    public function findOneOr404($id){
        $ressource = $this->em->getRepository('AppBundle:Ressource')->findOneBy(['id' => $id]);

        if(!$ressource){
            throw new NotFoundHttpException('Ressource not found');
        }

        return $ressource;
    }
}