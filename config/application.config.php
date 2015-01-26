<?php

$env = getenv('APP_ENV') ? : 'production';
// Use the $env value to determine which modules to load
$modules = array(
//    'Application',
    'DoctrineModule',
    'DoctrineORMModule',
    'DoctrineDataFixtureModule',
    'AGLBase',
    'AGLCOX',
    'AGLCOXSite',
);
if ($env == 'development') {
    $modules[] = 'ZendDeveloperTools';
    $modules[] = 'OcraServiceManager';
}
return array(
    'modules' => $modules,
    'module_listener_options' => array(
        'module_paths' => array(
            './module',
            './vendor',
        ),
        'config_glob_paths' => array(
            'config/autoload/{,*.}{global,local}.php',
        ),
        // 'config_cache_enabled' => ($env == 'production'),
        // 'config_cache_key' => 'app_config',
        'module_map_cache_enabled' => ($env == 'production'),
        'module_map_cache_key' => 'module_map',
        'cache_dir' => 'data/config/',
        'check_dependencies' => ($env != 'production'),
    ),
);
