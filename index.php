<?php

ini_set('display_errors', 1); // enable in dev

session_start();

require_once "core/Basesql.php";
require_once "conf.inc.php";


function autoloader($class)
{
    $path_core = "core/".$class.".php";
    $path_models = "models/".$class.".php";

    if (file_exists($path_core))
    {
        include $path_core;
    }else if (file_exists($path_models))
    {
        include $path_models;
    }
}

spl_autoload_register('autoloader');



$route = Routing::setRouting();

$name_controller = $route['controller']."Controller";
$path_controller = "controllers/" . $name_controller . ".php";

if (file_exists($path_controller))
{
	include $path_controller;

    $controller = new $name_controller();
	$name_action = $route['action']."Action";

	if (method_exists($controller, $name_action))
	{
		$controller->$name_action($route['args']);
	}
	else
	{
        http_response_code(404);
        die("404 : L'action n'existe pas");
	}
}
else
{
    http_response_code(404);
    die("404 : le controller n'existe pas");
}
