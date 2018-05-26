<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>

	<h1><?=$title ?></h1>
	<span style='font-size: 10px; color: #555'><?=$dt ?></span>
	<div style='border:1px solid #ddd; padding:20px'><?=$content ?></div>
	
	


<? if ($auth) : ?> 
	<a href="edit.php?id=<?=$id ?>">Редактировать</a><br>
	<a href="delete.php?id=<?=$id ?>">Удалить</a><br>
	<a href="/">Назад</a>
	<a href="login.php">Выйти</a>"
<? else : ?>
	<a href="/">Назад</a><br><a href="login.php">Войти</a>
<? endif; ?>

</body>
</html>