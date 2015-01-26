<?php

namespace AGLBase\Controller;

use Zend\Mvc\Controller\AbstractActionController,
    Zend\View\Model\ViewModel,
    Zend\Authentication\AuthenticationService,
    Zend\Authentication\Storage\Session as SessionStorage,
    AGLBase\Form\Login as LoginForm;

class AuthController extends AbstractActionController {

    public function indexAction() {
        $form = new LoginForm;
        $error = false;

        $request = $this->getRequest();

        if ($request->isPost()) {
            $form->setData($request->getPost());
            if ($form->isValid()) {
                $data = $request->getPost()->toArray();

                $sessionStorage = new SessionStorage("AGLBase");

                $auth = new AuthenticationService;
                $auth->setStorage($sessionStorage);

                $authAdapter = $this->getServiceLocator()->get("AGLBase\Auth\Adapter");
                $authAdapter->setUsername($data['email']);
                $authAdapter->setPassword($data['password']);

                $result = $auth->authenticate($authAdapter);

                if ($result->isValid()) {
                    $sessionStorage->write($auth->getIdentity()['user'], null);
                    return $this->redirect()->toRoute('aglbase-admin-usr/default', array('controller' => 'users'));
                } else {
                    $error = true;
                }
            }
        }
        return new ViewModel(array('form' => $form, 'error' => $error));
    }

    public function logoutAction() {
        $auth = new AuthenticationService;
        $auth->setStorage(new SessionStorage('AGLBase'));
        $auth->clearIdentity();

        return $this->redirect()->toRoute('aglbase-auth');
    }

}
