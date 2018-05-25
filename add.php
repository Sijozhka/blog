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

	
	if (count($_POST) > 0) {  # если форма была отправлена
		# валидация формы
		$title = trim($_POST["title"]);
		$content = trim($_POST["content"]);

		
		$cont = messages_isset_title($db, $title);
		$errors = messages_validate($title, $content);



		if (empty($errors)) {
			messages_add($db, $title, $content);
			header("Location: index.php");
			exit();

		} elseif ($cont) {
			$msg = "Статья с таким названием уже есть!";
		} else {
			# если все ок, то сохраняем статью и переадресуем на список статей index.php
			$msg2 = "Заполните поля формы ";
		}

	} else {
		$msg2 = "Заполните поля формы для создания новости";
		$title ='';
		$content ='';
		$errors=[];
	}

	$shablon =  template('v/v_add.php', [
		'msg2' => $msg2,
		'msg' => $msg,
		'title' => $title,
		'content' => $content,
		'errors' => $errors
	]); 
	

    $html = template('v/v_main.php', [
        'zag' => 'Добавление комментария',
        'form' => $shablon
    ]);
    echo $zag;
    echo $html;



	
 ?>




