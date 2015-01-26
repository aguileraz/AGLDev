<?php

namespace AGLOther;

return array(
    'router' => array(
        'routes' => array(
            //
        )
    ),
    'controllers' => array(
        'invokables' => array(
            'AGLOther\Controller\Index' => 'AGLOther\Controller\IndexController',
        )
    ),
    'view_manager' => array(
        'strategies' => array(
            'ViewJsonStrategy'
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
                    //
                )
            )
        )
    ),
);