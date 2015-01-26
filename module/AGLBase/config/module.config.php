<?php

namespace AGLBase;

return array(
    'router' => array(
        'routes' => array(
            'aglbase-register' => array(
                'type' => 'Literal',
                'options' => array(
                    'route' => '/register',
                    'defaults' => array(
                        '__NAMESPACE__' => 'AGLBase\Controller',
                        'controller' => 'Index',
                        'action' => 'register',
                    )
                )
            ),
            'aglbase-activate' => array(
                'type' => 'Segment',
                'options' => array(
                    'route' => '/register/activate[/:key]',
                    'constraints' => array(
                        'key' => '[a-zA-Z][a-zA-Z0-9_-]*'
                    ),
                    'defaults' => array(
                        '__NAMESPACE__' => 'AGLBase\Controller',
                        'controller' => 'Index',
                        'action' => 'activate',
                    )
                )
            ),
            'aglbase-auth' => array(
                'type' => 'Literal',
                'options' => array(
                    'route' => '/auth',
                    'defaults' => array(
                        '__NAMESPACE__' => 'AGLBase\Controller',
                        'controller' => 'Auth',
                        'action' => 'index',
                    )
                )
            ),
            'aglbase-logout' => array(
                'type' => 'Literal',
                'options' => array(
                    'route' => '/auth/logout',
                    'defaults' => array(
                        '__NAMESPACE__' => 'AGLBase\Controller',
                        'controller' => 'Auth',
                        'action' => 'logout',
                    )
                )
            ),
            'aglbase-admin-usr' => array(
                'type' => 'Literal',
                'options' => array(
                    'route' => '/admin/usr',
                    'defaults' => array(
                        '__NAMESPACE__' => 'AGLBase\Controller',
                        'controller' => 'Users',
                        'action' => 'index'
                    )
                ),
                'may_terminate' => true,
                'child_routes' => array(
                    'default' => array(
                        'type' => 'Segment',
                        'options' => array(
                            'route' => '/[:controller[/:action][/:id]]',
                            'constraints' => array(
                                'controller' => '[a-zA-Z][a-zA-Z0-9_-]*',
                                'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                                'id' => '[0-9]*',
                            ),
                            'defaults' => array(
                                '__NAMESPACE__' => 'AGLBase\Controller',
                                'controller' => 'Users',
                            )
                        ),
                    ),
                    'paginator' => array(
                        'type' => 'Segment',
                        'options' => array(
                            'route' => '/[:controller[/page/:page]]',
                            'constraints' => array(
                                'controller' => '[a-zA-Z][a-zA-Z0-9_-]*',
                                'page' => '[0-9]*',
                            ),
                            'defaults' => array(
                                '__NAMESPACE__' => 'AGLBase\Controller',
                                'controller' => 'Users',
                            )
                        )
                    )
                )
            ),
            'aglbase-admin-acl' => array(
                'type' => 'Literal',
                'options' => array(
                    'route' => '/admin/acl',
                    'defaults' => array(
                        '__NAMESPACE__' => 'AGLBase\Controller',
                        'controller' => 'Roles',
                        'action' => 'index'
                    )
                ),
                'may_terminate' => true,
                'child_routes' => array(
                    'default' => array(
                        'type' => 'Segment',
                        'options' => array(
                            'route' => '/[:controller[/:action][/:id]]',
                            'constraints' => array(
                                'controller' => '[a-zA-Z][a-zA-Z0-9_-]*',
                                'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                                'id' => '[0-9]*',
                            ),
                            'defaults' => array(
                                '__NAMESPACE__' => 'AGLBase\Controller',
                                'controller' => 'roles',
                            )
                        ),
                    ),
                    'paginator' => array(
                        'type' => 'Segment',
                        'options' => array(
                            'route' => '/[:controller[/page/:page]]',
                            'constraints' => array(
                                'controller' => '[a-zA-Z][a-zA-Z0-9_-]*',
                                'page' => '[0-9]*',
                            ),
                            'defaults' => array(
                                '__NAMESPACE__' => 'AGLBase\Controller',
                                'controller' => 'roles',
                            )
                        )
                    )
                )
            ),
            'aglbase-rest' => array(
                'type' => 'Segment',
                'options' => array(
                    'route' => '/api/user[/:id]',
                    'constraints' => array(
                        'id' => '[0-9]*'
                    ),
                    'defaults' => array(
                        '__NAMESPACE__' => 'AGLBase\Controller',
                        'controller' => 'UserRest',
                    )
                )
            )
        )
    ),
    'service_manager' => array(
        'abstract_factories' => array(
            'Zend\Cache\Service\StorageCacheAbstractServiceFactory',
            'Zend\Log\LoggerAbstractServiceFactory'
        )
    ),
    'controllers' => array(
        'invokables' => array(
            'AGLBase\Controller\Index' => 'AGLBase\Controller\IndexController',
            'AGLBase\Controller\Users' => 'AGLBase\Controller\UsersController',
            'AGLBase\Controller\Crud' => 'AGLBase\Controller\CrudController',
            'AGLBase\Controller\Auth' => 'AGLBase\Controller\AuthController',
            'AGLBase\Controller\Roles' => 'AGLBase\Controller\RolesController',
            'AGLBase\Controller\Resources' => 'AGLBase\Controller\ResourcesController',
            'AGLBase\Controller\Privileges' => 'AGLBase\Controller\PrivilegesController',
            'AGLBase\Controller\UserRest' => 'AGLBase\Controller\UserRestController',
        )
    ),
    'view_manager' => array(
        'template_path_stack' => array(
            __DIR__ . '/../view'
        )
    ),
    'doctrine' => array(
        'driver' => array(
            __NAMESPACE__ . '_driver' => array(
                'class' => 'Doctrine\ORM\Mapping\Driver\AnnotationDriver',
                'cache' => 'array',
                'paths' => array(__DIR__ . '/../src/' . __NAMESPACE__ . '/Entity')
            ),
            'orm_default' => array(
                'drivers' => array(
                    __NAMESPACE__ . '\Entity' => __NAMESPACE__ . '_driver'
                )
            )
        )
    ),
    'data-fixture' => array(
        __NAMESPACE__ . '_fixture' => __DIR__ . '/../src/' . __NAMESPACE__ . '/Fixture'
    )
);
