<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
<? if (!$news) : ?>
	<p>ERROR 404</p><p>Нет такой статьи</p>

<? else : ?> 
	<h1><?=$news['title'] ?></h1>
	<span style='font-size: 10px; color: #555'><?=$news['dt'] ?></span>
	<div style='border:1px solid #ddd; padding:20px'><?=$news['content'] ?></div>
<? endif; ?>	
	


<? if (is_Auth()) : ?> 
	<a href="edit.php?id=<?=$id ?>">Редактировать</a><br>
	<a href="delete.php?id=<?=$id ?>">Удалить</a><br>
	<a href="index.php">Назад</a>
	<a href="login.php">Выйти</a>"
<? else : ?>
	<a href="index.php">Назад</a><br><a href="login.php">Войти</a>
<? endif; ?>

</body>
</html>