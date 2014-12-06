<?php
return array(
    'router' => array(
        'routes' => array(
            'user-api.rest.doctrine.user' => array(
                'type' => 'Segment',
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
        'uri' => array(
            0 => 'user-api.rest.doctrine.user',
        )
    ),
    'zf-rest' => array(
        'UserApi\\V1\\Rest\\User\\Controller' => array(
            'listener' => 'UserApi\\V1\\Rest\\User\\UserResource',
            'route_name' => 'user-api.rest.doctrine.user',
            'route_identifier_name' => 'user_id',
            'entity_identifier_name' => 'id',
            'collection_name' => 'user',
            'entity_http_methods' => array(
                0 => 'GET',
                1 => 'PATCH',
                2 => 'PUT',
                3 => 'DELETE',
            ),
            'collection_http_methods' => array(
                0 => 'GET',
                1 => 'POST',
            ),
            'collection_query_whitelist' => array(
                0 => 'query',
                1 => 'orderBy',
            ),
            'page_size' => 25,
            'page_size_param' => null,
            'entity_class' => 'Core\\Entity\\User',
            'collection_class' => 'UserApi\\V1\\Rest\\User\\UserCollection',
        )
    ),
    'zf-content-negotiation' => array(
        'controllers' => array(
            'UserApi\\V1\\Rest\\User\\Controller' => 'HalJson',
        ),
        'accept_whitelist' => array(
            'UserApi\\V1\\Rest\\User\\Controller' => array(
                0 => 'application/vnd.user-api.v1+json',
                1 => 'application/hal+json',
                2 => 'application/json',
            )
        ),
        'content_type_whitelist' => array(
            'UserApi\\V1\\Rest\\User\\Controller' => array(
                0 => 'application/vnd.db-api.v1+json',
                1 => 'application/json',
            )
        )
    ),
    'zf-hal' => array(
        'metadata_map' => array(
            'Core\\Entity\\User' => array(
                'route_identifier_name' => 'user_id',
                'entity_identifier_name' => 'id',
                'route_name' => 'user-api.rest.doctrine.user',
                'hydrator' => 'UserApi\\V1\\Rest\\User\\UserHydrator',
                //'max_depth' => 2,
            ),
            'UserApi\\V1\\Rest\\User\\UserCollection' => array(
                'entity_identifier_name' => 'id',
                'route_name' => 'user-api.rest.doctrine.user',
                'is_collection' => true,
            )
        )
    ),
    'zf-apigility' => array(
        'doctrine-connected' => array(
            'UserApi\\V1\\Rest\\User\\UserResource' => array(
                'object_manager' => 'doctrine.entitymanager.orm_default',
                'hydrator' => 'UserApi\\V1\\Rest\\User\\UserHydrator',
            )
        )
    ),
    'doctrine-hydrator' => array(
        'UserApi\\V1\\Rest\\User\\UserHydrator' => array(
            'entity_class' => 'Core\Entity\User',
            'object_manager' => 'doctrine.entitymanager.orm_default',
            'by_value' => 'false',
            'hydrator_strategies' => array(),
            'user_generated_hydrator' => true,
        )
    )
);
