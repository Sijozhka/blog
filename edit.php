<?php 
	session_start();
	include_once("m/functions.php");
	include_once("m/system.php");
	include_once("m/pdo.php");
	include_once("m/messages.php");

	$db = connect_db();
	if (!is_Auth()) {
		header("Location: login.php");
		exit();
	}
    $id = $_GET['id'];
    $msg ='';
   

		if (count($_POST) > 0){ 
		           
			$title = trim($_POST["title"]);
			$content = trim($_POST["content"]);
			
			$errors = messages_validate($title, $content);
			
			if (empty($errors)) {
				messages_add($db, $title, $content);
				header("Location: index.php");
				exit();

			} elseif ($cont) {
				$msg = "Статья с таким названием уже есть!";
			} else {
				# если все ок, то сохраняем статью и переадресуем на список статей index.php
				$msg2 = "Заполните поля формы для создания новости";
			}
		} else {
			$msg2 = "Заполните поля формы для создания новости";
			$title ='';
			$content ='';
			$errors=[];
		}	

	if ($id !='' && messages_isset_id($db, $id)) {
		
		$news = messages_one($db,$id);
		$title = $news['title'];
		$content = $news['content'];
		
		$shablon =  template('v/v_edit.php', [
			'msg2' => $msg2,
			'msg' => $msg,
			'title' => $title,
			'content' => $content,
			'errors' => $errors
		]); 
		

	    $html = template('v/v_main.php', [
	        'zag' => 'Редактирование комментария',
	        'form' => $shablon
	    ]);
	    echo $zag;
	    echo $html;


		} else {
			$msg = "<p>ERROR 404</p><p>Нет такой статьи</p>";
		}

 ?>



 

