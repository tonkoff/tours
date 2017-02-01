<?php
session_start();

function __autoload($className)
{
//Zaredi papka entities ako e entity
//Zaredi papka collections ako e kolekciq
//Zaredi papka system ako ne e nito kolekciq nito entity

	if (strpos($className, 'Collection') > 0) {
		$path = __DIR__.'/../common/models/collections/' . $className . '.php';
	} elseif (strpos($className, 'Entity') > 0) {
		$path = __DIR__.'/../common/models/entities/' . $className . '.php';
	} 	 elseif (strpos($className, 'Controller') > 0) {
		$path = __DIR__.'/../common/controllers/admin/' . $className . '.php';

} 	else {
		$path = __DIR__.'/../common/system/' . $className . '.php';
	}

	if(is_file($path) && !class_exists($path)) {
		require_once $path;
	}
}

$controller = (isset($_GET['c'])) ? $_GET['c'] : 'dashboard';
$method  	= (isset($_GET['m'])) ? $_GET['m'] : 'index';

$controllerName = ucfirst($controller).'Controller';

if(class_exists($controllerName)) {
	$controller = new $controllerName();
	$controller->$method();
} else {
	   echo 'Controller with this name not exist!';
}



