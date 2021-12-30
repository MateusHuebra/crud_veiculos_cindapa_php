<?php

spl_autoload_register(function ($class_name) {
    require str_replace('\\', '/', $class_name).'.php';
});

$requestUri = explode('?', $_SERVER['REQUEST_URI']);
$requestUri = explode('/', $requestUri[0]);
if(empty($requestUri[1])) {
	$requestUri[1] = 'Home';
}
$className = 'Controller\\'.ucfirst($requestUri[1]);
if(isset($requestUri[2])) {
	$methodName = $requestUri[2];
} else {
	$methodName = 'index';
}

$connection = new Dao\Connection();

$controllers = array_diff(scandir('Controller'), ['..', '.', 'Controller.php', 'LoggedPageController.php']);
$controllers = array_map('strtolower', $controllers);

if(!in_array(strtolower($requestUri[1]).'.php', $controllers) || !in_array($methodName, get_class_methods($className))) {
    $className = 'Controller\\PageNotFound';
    $methodName = 'index';
    $controller = new $className();
    $controller->$methodName();
} else {
	$controller = new $className();
	$controller->$methodName();
}

\Services\SessionMessages::unset();