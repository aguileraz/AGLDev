<?php

namespace AGLBase\Controller;

use Zend\View\Model\ViewModel,
    AGLBase\Controller\CrudController;

class PrivilegesController extends CrudController {

    public function __construct() {
        $this->entity = 'AGLBase\Entity\Privilege';
        $this->service = 'AGLBase\Service\Privilege';
        $this->form = 'AGLBase\Form\Privilege';
        $this->controller = 'privileges';
        $this->route = 'aglbase-admin/default';
    }

    public function newAction() {
        $form = $this->getServiceLocator()->get('AGLBase\Form\Privilege');
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
        $form = $this->getServiceLocator()->get('AGLBase\Form\Privilege');
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

//    public function registerAction() {
//        $form = new FormRole;
//        $request = $this->getRequest();
//
//        if ($request->isPost()) {
//            $form->setData($request->getPost());
//            if ($form->isValid()) {
//                $service = $this->getServiceLocator()->get('AGLBase\Service\Role');
//                if ($service->insert($request->getPost()->toArray())) {
//                    $fm = $this->flashMessenger()
//                            ->setNamespace('AGLBase')
//                            ->addMessage("Role cadastrada com sucesso");
//                }
//
//                return $this->redirect()->toRoute('aglbase-register');
//            }
//        }
//
//        $messages = $this->flashMessenger()
//                ->setNamespace('AGLBase')
//                ->getMessages();
//
//        return new ViewModel(array('form' => $form, 'messages' => $messages));
//    }
}
