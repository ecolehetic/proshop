<?php

namespace AppBundle\Manager;

use AppBundle\Entity\Ordered;
use Doctrine\ORM\EntityManager;

class OrderedManager
{
    protected $em;

    public function __construct(EntityManager $em)
    {
        $this->em = $em;
    }

    public function loadOrdered($OrderedId)
    {
        return $this->getRepository()->findOneBy(['id' => $OrderedId]);
    }

    public function saveOrdered(Ordered $ordered)
    {
        $this->persistAndFlush($ordered);
    }

    protected function persistAndFlush($entity)
    {
        $this->em->persist($entity);
        $this->em->flush();
    }

    public function getRepository()
    {
        return $this->em->getRepository('AppBundle:Ordered');
    }
}