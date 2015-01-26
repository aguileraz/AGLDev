<?php

namespace AGLBase\Controller;

use Zend\View\Model\ViewModel,
    AGLBase\Controller\CrudController;

class RolesController extends CrudController {

    public function __construct() {
        $this->entity = 'AGLBase\Entity\Role';
        $this->service = 'AGLBase\Service\Role';
        $this->form = 'AGLBase\Form\Role';
        $this->controller = 'roles';
        $this->route = 'aglbase-admin-acl/default';
    }

    public function newAction() {
        $form = $this->getServiceLocator()->get('AGLBase\Form\Role');
        $request = $this->getRequest();

        if ($request->isPost()) {
            $form->setData($request->getPost());
            if ($form->isValid()) {
                $service = $this->getServiceLocator()->get($this->service);
                $service->insert($request->getPost()->toArray());

                return $this->redirect()->toRoute($this->route, array('controller' => $this->controller));
            }
        }

        return new ViewModel(array('form' => $form));
    }

    public function editAction() {
        $form = $this->getServiceLocator()->get('AGLBase\Form\Role');
        $request = $this->getRequest();

        $repository = $this->getEm()->getRepository($this->entity);
        $entity = $repository->find($this->params()->fromRoute('id', 0));

        if ($this->params()->fromRoute('id', 0)) {
            $form->setData($entity->toArray());
        }

        if ($request->isPost()) {
            $form->setData($request->getPost());
            if ($form->isValid()) {
                $service = $this->getServiceLocator()->get($this->service);
                $service->update($request->getPost()->toArray());

                return $this->redirect()->toRoute($this->route, array('controller' => $this->controller));
            }
        }

        return new ViewModel(array('form' => $form));
    }

    public function testeAction() {
        $acl = $this->getServiceLocator()->get('AGLBase\Permissions\Acl');
        echo $acl->isAllowed("Admin", "Posts", "Excluir") ? "Permitido" : "Negado";
        echo "<br />";

        $cache = $this->getServiceLocator()->get('Cache');
        if (!$result = $cache->getItem('dataAgora')) {
            $result = new \DateTime('now');
            $cache->addItem('dataAgora', $result);
        }
        echo $result->format('Y-m-d H:i:s');

        die;
    }

}
