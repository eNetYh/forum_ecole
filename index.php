<?php
session_start();
define('WEBROOT',  str_replace('index.php','',$_SERVER['SCRIPT_NAME'])); //Recupère le chemin web
define('ROOT', str_replace('index.php','',$_SERVER['SCRIPT_FILENAME'])); //Recupère le chemni complet
require(ROOT.'core/model.php'); //Requiert le Model Global
require(ROOT.'core/manager.php'); //Requiert le Manager Global
require(ROOT.'core/controller.php'); //Requiert le Controller Global



$params = explode('/',$_GET['p']); //Divise l url en 2 tab[0] = controller, tab[1] = action

if(!empty($params[0]) && !empty($_SESSION['id']) )
{
    $controller = $params[0]; // recupère le controller
}
else
{
    $controller = 'home';
}


if(!empty($params[1]) ) //Si l action est vide la remplace par index
{
    $action = $params[1];
}
else
{
    $action = 'index';
}


if(file_exists('controllers/'.$controller.'.php'))
{
 	require('controllers/'.$controller.'.php'); //Requiert le controller concerné
	$controller = new $controller(); //Init le controller
}

if(method_exists($controller, $action)){
	$controller->$action();
}
else
{
    require('controllers/application.php');
    $app = new application();
    $app->notfound();
}
?>
