<?php

namespace AGLBase\Controller;

use Zend\Mvc\Controller\AbstractRestfulController,
    Zend\View\Model\JsonModel;

class UserRestController extends AbstractRestfulController {

    public function getList() {
        $em = $this->getServiceLocator()->get('Doctrine\ORM\EntityManager');
        $repo = $em->getRepository('AGLBase\Entity\User');

        $data = $repo->findArray();

        return new JsonModel(array('data' => $data));
    }

    public function get($id) {
        $em = $this->getServiceLocator()->get('Doctrine\ORM\EntityManager');
        $repo = $em->getRepository('AGLBase\Entity\User');

        $data = $repo->find($id)->toArray();

        return new JsonModel(array('data' => $data));
    }

    public function create($data) {
        $userService = $this->getServiceLocator()->get('AGLBase\Service\User');

        if ($data) {
            $user = $userService->insert($data);
            if ($user) {
                return new JsonModel(array('data' => array('id' => $user->getId(), 'success' => true)));
            } else {
                return new JsonModel(array('data' => array('success' => false)));
            }
        } else {
            return new JsonModel(array('data' => array('success' => false)));
        }
    }

    public function update($id, $data) {
        $data['id'] = $id;
        $userService = $this->getServiceLocator()->get('AGLBase\Service\User');

        if ($data) {
            $user = $userService->update($data);
            if ($user) {
                return new JsonModel(array('data' => array('id' => $user->getId(), 'success' => true)));
            } else {
                return new JsonModel(array('data' => array('success' => false)));
            }
        } else {
            return new JsonModel(array('data' => array('success' => false)));
        }
    }

    public function delete($id) {
        $userService = $this->getServiceLocator()->get('AGLBase\Service\User');
        $res = $userService->delete($id);

        if ($res) {
            return new JsonModel(array('data' => array('success' => true)));
        } else {
            return new JsonModel(array('data' => array('success' => false)));
        }
    }

}
