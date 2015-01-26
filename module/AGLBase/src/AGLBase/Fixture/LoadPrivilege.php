<?php

namespace AGLBase\Fixture;

use Doctrine\Common\DataFixtures\AbstractFixture,
    Doctrine\Common\DataFixtures\OrderedFixtureInterface,
    Doctrine\Common\Persistence\ObjectManager,
    AGLBase\Entity\Privilege;

class LoadPrivilege extends AbstractFixture implements OrderedFixtureInterface {

    public function Load(ObjectManager $manager) {
//        $role1 = $manager->getReference('AGLBase\Entity\Role', 1);
//        $resource1 = $manager->getReference('AGLBase\Entity\Resource', 1);
//
//        $role2 = $manager->getReference('AGLBase\Entity\Role', 2);
//        $resource2 = $manager->getReference('AGLBase\Entity\Resource', 2);
//
//        $role3 = $manager->getReference('AGLBase\Entity\Role', 3);
//        $resource3 = $manager->getReference('AGLBase\Entity\Resource', 3);
//
//        $role4 = $manager->getReference('AGLBase\Entity\Role', 4);
//        $resource4 = $manager->getReference('AGLBase\Entity\Resource', 4);
//
//        $privilege = New Privilege;
//        $privilege->setNome('Visualizar')
//                ->setRole($role1)
//                ->setResource($resource1);
//        $manager->persist($privilege);
//
//        $privilege2 = New Privilege;
//        $privilege2->setNome('Novo / Editar')
//                ->setRole($role3)
//                ->setResource($resource1);
//        $manager->persist($privilege2);
//
//        $privilege3 = New Privilege;
//        $privilege3->setNome('Excluir')
//                ->setRole($role4)
//                ->setResource($resource1);
//        $manager->persist($privilege3);
//
//        $manager->flush();
    }

    public function getOrder() {
        return 3;
    }

}

