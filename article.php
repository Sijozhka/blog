<?php 
use m\ArticleModel;
session_start();
include_once("m/functions.php");
function __autoload($classname) 
{
	include_once str_replace('\\', DIRECTORY_SEPARATOR, $classname).'.php';
}


$mArticles = ArticleModel::Instance();

$msg = '';
$id = $_GET['id'];

$news = $mArticles->get($id);


include_once("v/v_article.php");
?>
	
	
