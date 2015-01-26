<?php

namespace AGLBase\Permissions;

use Zend\Permissions\Acl\Acl as ClassAcl,
    Zend\Permissions\Acl\Role\GenericRole as Role,
    Zend\Permissions\Acl\Resource\GenericResource as Resource;

class Acl extends ClassAcl {

    protected $roles;
    protected $resources;
    protected $privileges;

    public function __construct(array $roles, array $resources, array $privileges) {
        $this->loadRoles($roles);
        $this->loadResources($resources);
        $this->loadPrivileges($privileges);
    }

    protected function loadRoles($roles) {
        foreach ($roles as $role) {
            if ($role->getParent()) {
                $this->addRole(new Role($role->getNome(), new Role($role->getParent()->getNome())));
            } else {
                $this->addRole(new Role($role->getNome()));
            }

            if ($role->getIsAdmin()) {
                $this->allow($role->getNome(), array(), array());
            }
        }
    }

    protected function loadResources($resources) {
        foreach ($resources as $resource) {
            $this->addResource(new Resource($resource->getNome()));
        }
    }

    protected function loadPrivileges($privileges) {
        foreach ($privileges as $privilege) {
            $this->allow($privilege->getRole()->getNome(), $privilege->getResource()->getNome(), $privilege->getNome());
        }
    }

}
