<?php
define('REQUEST_MICROTIME', microtime(true));
date_default_timezone_set('America/Sao_Paulo');
 /**
  * Display all errors when APP_ENV is development.
  */
 if (getenv('APP_ENV') == 'development') {
     error_reporting(E_ALL);
     ini_set("display_errors", 1);
 }

/**
 * This makes our life easier when dealing with paths. Everything is relative
 * to the application root now.
 */
chdir(dirname(__DIR__));
// getcwd();
// echo dirname(__DIR__)." - ".__DIR__;
define('ROOT_PATH', dirname(__DIR__));
define('ROOT_SITE', dirname(__DIR__)."/public_html");
define('ZF2_PATH', dirname(__DIR__)."/vendor/zendframework/zendframework/library");

// Decline static file requests back to the PHP built-in webserver
if (php_sapi_name() === 'cli-server' && is_file(__DIR__ . parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH))) {
    return false;
}

// Setup autoloading
// if ($_SERVER['APP_ENV'] == 'production') {
// 	$libDir = ZF2_PATH;
// 	require $libDir . '/Zend/Stdlib/compatibility/autoload.php';
// 	require $libDir . '/Zend/Session/compatibility/autoload.php';
// }
if (file_exists('init_autoloader.php')) {
	require 'init_autoloader.php';
} elseif (file_exists(dirname(__DIR__).'/init_autoloader.php')) {
	require dirname(__DIR__).'/init_autoloader.php';
}

// Run the application!
if (file_exists('config/application.config.php')) {
	Zend\Mvc\Application::init(require 'config/application.config.php')->run();
} elseif (file_exists(dirname(__DIR__).'/config/application.config.php')) {
	Zend\Mvc\Application::init(require dirname(__DIR__).'/config/application.config.php')->run();
}