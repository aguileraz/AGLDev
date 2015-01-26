<?php

namespace AGLBase\Service;

use Doctrine\ORM\EntityManager,
    Zend\Stdlib\Hydrator,
    AGLBase\Service\AbstractService;

class Privilege extends AbstractService {

    public function __construct(EntityManager $em) {
        parent::__construct($em);

        $this->entity = 'AGLBase\Entity\Privilege';
    }

    public function insert(array $data) {
        $entity = new $this->entity($data);

        $role = $this->em->getReference('AGLBase\Entity\Role', $data['role']);
        $entity->setRole($role);

        $resource = $this->em->getReference('AGLBase\Entity\Resource', $data['resource']);
        $entity->setResource($resource);

        $this->em->persist($entity);
        $this->em->flush();
        return $entity;
    }

    public function update(array $data) {
        $entity = $this->em->getReference($this->entity, $data['id']);
        (new Hydrator\ClassMethods())->hydrate($data, $entity);

        $role = $this->em->getReference('AGLBase\Entity\Role', $data['role']);
        $entity->setRole($role);

        $resource = $this->em->getReference('AGLBase\Entity\Resource', $data['resource']);
        $entity->setResource($resource);

        $this->em->persist($entity);
        $this->em->flush();
        return $entity;
    }

}

