<?php

namespace AGLBase;

use Zend\Mvc\MvcEvent,
    Zend\Mail\Transport\Smtp as SmtpTransport,
    Zend\Mail\Transport\SmtpOptions,
    AGLBase\Auth\Adapter as AuthAdapter,
    Zend\Authentication\AuthenticationService,
    Zend\Authentication\Storage\Session as SessionStorage,
    Zend\ModuleManager\ModuleManager;

class Module {

    public function getConfig() {
        return include __DIR__ . '/config/module.config.php';
    }

    public function getAutoloaderConfig() {
        return array(
            'Zend\Loader\StandardAutoloader' => array(
                'namespaces' => array(
                    __NAMESPACE__ => __DIR__ . '/src/' . __NAMESPACE__,
                ),
            ),
        );
    }

    public function init(ModuleManager $moduleManager) {
        $sharedEvents = $moduleManager->getEventManager()->getSharedManager();
        $sharedEvents->attach("Zend\Mvc\Controller\AbstractActionController", MvcEvent::EVENT_DISPATCH, array($this, 'mvcPreDispatch'), 100);
    }

    public function mvcPreDispatch($e) {
        $auth = new AuthenticationService;
        $auth->setStorage(new SessionStorage("AGLBase"));

        $controller = $e->getTarget();
        $matchedRoute = $controller->getEvent()->getRouteMatch()->getMatchedRouteName();

        if ((!$auth->hasIdentity()) && ($matchedRoute == "aglbase-admin" || $matchedRoute == "aglbase-admin/paginator")) {
            return $controller->redirect()->toRoute("aglbase-auth");
        }
    }

    public function getServiceConfig() {
        return array(
            'factories' => array(
                'Cache' => function($sm) {
                    $config = $sm->get('Config');
                    $factory = $config['caches']['filesystem'];
                    $cache = \Zend\Cache\StorageFactory::factory($factory);
                    return $cache;
                },
                'AGLBase\Mail\Transport' => function($sm) {
                    $config = $sm->get('Config');

                    $transport = new SmtpTransport;
                    $options = new SmtpOptions($config['mail']);
                    $transport->setOptions($options);

                    return $transport;
                },
                'AGLBase\Service\User' => function($sm) {
                    return new Service\User($sm->get('Doctrine\ORM\EntityManager'), $sm->get('AGLBase\Mail\Transport'), $sm->get('View'));
                },
                'AGLBase\Auth\Adapter' => function($sm) {
                    return new AuthAdapter($sm->get('Doctrine\ORM\EntityManager'));
                },
                'AGLBase\Form\Role' => function($sm) {
                    $em = $sm->get('Doctrine\ORM\EntityManager');

                    $repo = $em->getRepository('AGLBase\Entity\Role');
                    $parent = $repo->fetchParent();

                    return new Form\Role('role', $parent);
                },
                'AGLBase\Form\Privilege' => function($sm) {
                    $em = $sm->get('Doctrine\ORM\EntityManager');

                    $repoRole = $em->getRepository('AGLBase\Entity\Role');
                    $roles = $repoRole->fetchParent();

                    $repoResource = $em->getRepository('AGLBase\Entity\Resource');
                    $resources = $repoResource->fetchPairs();

                    return new Form\Privilege('privilege', $roles, $resources);
                },
                'AGLBase\Service\Role' => function($sm) {
                    return new Service\Role($sm->get('Doctrine\ORM\EntityManager'));
                },
                'AGLBase\Service\Resource' => function($sm) {
                    return new Service\Resource($sm->get('Doctrine\ORM\EntityManager'));
                },
                'AGLBase\Service\Privilege' => function($sm) {
                    return new Service\Privilege($sm->get('Doctrine\ORM\EntityManager'));
                },
                'AGLBase\Permissions\Acl' => function($sm) {
                    $em = $sm->get('Doctrine\ORM\EntityManager');

                    $repoRole = $em->getRepository('AGLBase\Entity\Role');
                    $roles = $repoRole->findAll();

                    $repoResource = $em->getRepository('AGLBase\Entity\Resource');
                    $resources = $repoResource->findAll();

                    $repoPrivilege = $em->getRepository('AGLBase\Entity\Privilege');
                    $privileges = $repoPrivilege->findAll();

                    return new Permissions\Acl($roles, $resources, $privileges);
                },
            )
        );
    }

    public function getViewHelperConfig() {
        return array(
            'invokables' => array(
                'UserIdentity' => new View\Helper\UserIdentity()
            )
        );
    }

}
