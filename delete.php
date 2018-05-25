<?php 
session_start();
	include_once("m/functions.php");
	include_once("m/pdo.php");
	include_once("m/messages.php");
	$db = connect_db();

	if (!is_Auth()) {
		header("Location: login.php");
		exit();
	}
	$id = $_GET['id'];
	messages_delete($db, $id);
	header("Location: index.php");
	exit();


 ?>