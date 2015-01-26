<?php

namespace AGLBase\Fixture;

use Doctrine\Common\DataFixtures\AbstractFixture,
    Doctrine\Common\DataFixtures\OrderedFixtureInterface,
    Doctrine\Common\Persistence\ObjectManager,
    AGLBase\Entity\Resource;

class LoadResource extends AbstractFixture implements OrderedFixtureInterface {

    public function Load(ObjectManager $manager) {
//        $resource = New Resource;
//        $resource->setNome('Posts');
//        $manager->persist($resource);
//
//        $resource2 = New Resource;
//        $resource2->setNome('Páginas');
//        $manager->persist($resource2);
//
//        $manager->flush();
    }

    public function getOrder() {
        return 2;
    }

}

