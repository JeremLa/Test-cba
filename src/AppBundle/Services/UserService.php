<?php
namespace AppBundle\Services;

use Doctrine\ORM\EntityManager;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class UserService
{

    private $em;

    function __construct(EntityManager $em)
    {
        $this->em = $em;
    }

    public function getAll(){
        return $this->em->getRepository('AppBundle:User')->findAll();
    }

    public function findOneOr404($id){
        $user = $this->em->getRepository('AppBundle:User')->findOneBy(['id' => $id]);

        if(!$user){
            throw new NotFoundHttpException('User not found');
        }

        return $user;
    }
}