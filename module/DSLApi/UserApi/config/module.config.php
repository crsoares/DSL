<?php
return array(
    'router' => array(
        'routes' => array(
            'user-api.rest.doctrine.user' => array(
                'type' => 'Zend\Mvc\Router\Http\Segment',
                'options' => array(
                    'route' => '/user-api/user[/:user_id]',
                    'defaults' => array(
                        'controller' => 'UserApi\\V1\\Rest\\User\\Controller',
                    ),
                ),
            ),
        ),
    ),
    'zf-versioning' => array(
        'url' => array(
            0 => 'user-api.rest.doctrine.user',
        )
    ),
    'zf-rest' => array(
        'UserApi\\V1\\Rest\\User\\Controller' => array(
            'listener' => 'UserApi\\V1\\Rest\\User\\UserResource',
            'route_name' => 'user-api.rest.doctrine.user',
            'route_identifier_name' => 'user_id',
            'collection_name' => 'user',
            'entity_http_methods' => array(
                0 => 'GET',
                1 => 'PATCH',
                2 => 'PUT',
                3 => 'DELETE',
            ),
        )
    )
);
