<?php
namespace UserApi;

return array(
    'router' => array(
        'routes' => array(
            'users-api' => array(
                'type' => 'Zend\Mvc\Router\Http\Segment',
                'options' => array(
                    'route' => '/api-user[/:controller][/:id]',
                    'constraints' => array(
                        'controller' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'id' => '[a-zA-Z0-9_-]*',
                    )
                )
            ),
            /*'users' => array(
                'type' => 'ResourceGraphRoute',
                'options' => array(
                    'route' => '/users',
                    'resource' => 'Core\Entity\User'
                )
            )*/
        )
    ),
    'controllers' => array(
        'invokables' => array(
            //'users' => 'UserApi\Controller\UserController',
        )
    ),
    'view_manager' => array(
        'strategies' => array(
            'ViewJsonStrategy'
        )
    )
);
