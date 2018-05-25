<?php 
ini_set('error reporting',E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
use c\ArticleController;

function __autoload($classname) 
{
	include_once str_replace('\\', DIRECTORY_SEPARATOR, $classname).'.php';
}



session_start();
$ctrl = new ArticleController();
$ctrl->indexAction();
$ctrl->render();




