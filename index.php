<?php

spl_autoload_register(function ($class_name) {
    require str_replace('\\', '/', $class_name).'.php';
});

$requestUri = explode('?', $_SERVER['REQUEST_URI']);
$requestUri = explode('/', $requestUri[0]);
$className = 'Controller\\'.ucfirst($requestUri[1]);
if(isset($requestUri[2])) {
	$methodName = $requestUri[2];
} else {
	$methodName = 'index';
}

$connection = new Dao\Connection();

if(!file_exists(str_replace('\\', '/', $className).'.php') || !in_array($methodName, get_class_methods($className))) {
    $className = 'Controller\\PageNotFound';
    $methodName = 'index';
    $controller = new $className();
    $controller->$methodName();
} else {
	$controller = new $className();
	$controller->$methodName();
}

\Services\SessionMessages::unset();