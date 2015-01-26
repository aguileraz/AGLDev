<?php

namespace AGLBase\Service;

use Doctrine\ORM\EntityManager,
	AGLBase\Service\AbstractService;
    

class Resource extends AbstractService {

    public function __construct(EntityManager $em) {
        parent::__construct($em);

        $this->entity = 'AGLBase\Entity\Resource';
    }

}

