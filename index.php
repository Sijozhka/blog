<?php 
ini_set('error reporting',E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);


function __autoload($classname) 
{
	include_once str_replace('\\', DIRECTORY_SEPARATOR, $classname).'.php';
}


session_start();
$app =  new core\App(new core\Request($_GET,$_POST,$_SERVER));
$app->go();



