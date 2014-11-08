<?php

return array(
	'router' => array(
		'routes' => array(
			'dsl-home' => array(
				'type' => 'Zend\Mvc\Router\Http\Segment',
				'options' => array(
					'route' => '/dslhome',
					'defaults' => array(
						'controller' => 'DSLTicket\Controller\Index',
						'action' => 'index',
					)
				)
			)
		)
	),
	'controllers' => array(
		'invokables' => array(
			'DSLTicket\Controller\Index' => 'DSLTicket\Controller\IndexController',
		)
	),
	'view_manager' => array(
		'template_path_stack' => array(
			__DIR__ . '/../view',
		)
	),
);