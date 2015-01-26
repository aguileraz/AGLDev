<?php

namespace AGLBase\Fixture;

use Doctrine\Common\DataFixtures\AbstractFixture,
    Doctrine\Common\DataFixtures\OrderedFixtureInterface,
    Doctrine\Common\Persistence\ObjectManager,
    AGLBase\Entity\Role;

class LoadRole extends AbstractFixture implements OrderedFixtureInterface {

    public function Load(ObjectManager $manager) {
//        $role = New Role;
//        $role->setNome('Visitante');
//        $manager->persist($role);
//
//        $visitante = $manager->getReference('AGLBase\Entity\Role', 1);
//        $role2 = New Role;
//        $role2->setNome('Registrado')
//                ->setParent($visitante);
//        $manager->persist($role2);
//
//        $registrado = $manager->getReference('AGLBase\Entity\Role', 2);
//        $role3 = New Role;
//        $role3->setNome('Redator')
//                ->setParent($registrado);
//        $manager->persist($role3);
//
//        $role4 = New Role;
//        $role4->setNome('Admin')
//                ->setisAdmin(true);
//        $manager->persist($role4);
//
//        $manager->flush();
    }

    public function getOrder() {
        return 1;
    }

}

