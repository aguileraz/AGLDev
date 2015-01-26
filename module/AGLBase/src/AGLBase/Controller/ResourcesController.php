<?php

namespace AGLBase\Controller;

AGLBase\Controller\CrudController;

class ResourcesController extends CrudController {

    public function __construct() {
        $this->entity = 'AGLBase\Entity\Resource';
        $this->service = 'AGLBase\Service\Resource';
        $this->form = 'AGLBase\Form\Resource';
        $this->controller = 'resources';
        $this->route = 'aglbase-admin-acl/default';
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

