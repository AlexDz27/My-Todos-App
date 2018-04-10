<?php

function __autoload($filename) {
	$filename = 'classes' . DIRECTORY_SEPARATOR . $filename;
	require_once str_replace("\\", DIRECTORY_SEPARATOR, $filename) . '.php';
}

\services\AppRegistry::setEnvironmentStatus('dev');

define('ROOT', __DIR__);

session_start();

$router = new \services\Router();
$router->initialize();

/////////////////////////////////////////////////////////////

