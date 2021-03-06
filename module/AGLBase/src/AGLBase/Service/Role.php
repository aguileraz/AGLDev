<?php

namespace AGLBase\Service;

use Doctrine\ORM\EntityManager,
    Zend\Stdlib\Hydrator,
    AGLBase\Service\AbstractService;

class Role extends AbstractService {

    public function __construct(EntityManager $em) {
        parent::__construct($em);

        $this->entity = 'AGLBase\Entity\Role';
    }

    public function insert(array $data) {
        $entity = new $this->entity($data);

        if ($data['parent']) {
            $parent = $this->em->getReference($this->entity, $data['parent']);
            $entity->setParent($parent);
        } else {
            $entity->setParent(null);
        }

        $this->em->persist($entity);
        $this->em->flush();
        return $entity;
    }

    public function update(array $data) {
        $entity = $this->em->getReference($this->entity, $data['id']);
        (new Hydrator\ClassMethods())->hydrate($data, $entity);

        if ($data['parent']) {
            $parent = $this->em->getReference($this->entity, $data['parent']);
            $entity->setParent($parent);
        } else {
            $entity->setParent(null);
        }

        $this->em->persist($entity);
        $this->em->flush();
        return $entity;
    }

}

