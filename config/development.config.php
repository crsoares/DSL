<?php

return array(
    'modules' => array(
    	'ZFTool',
        'ZF\Apigility\Admin',
        'ZF\Apigility\Welcome',
        'ZF\Configuration',
        'ZF\Apigility\Doctrine\Admin',
        //'ZendDeveloperTools',
    ),
    'module_listener_options' => array(
        'config_glob_paths' => array('config/autoload/{,*.}{global,local}-development.php'),
    )
);
