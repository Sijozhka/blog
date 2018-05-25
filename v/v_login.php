<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<form action="" method="post">
		<table>
			<tr>
				<td><label for="login">Логин</label></td>
				<td><input type="text" name="login" value="<?=$login ?>"></td>
			</tr>
			<tr>
				<td><label for="password">Пароль</label></td>
				<td><input type="password" name="password" value=""></td>
			</tr>
			<tr>
				<td><input type="checkbox" name="remember" value=""></td>
				<td><label for="remember">Запомнить</label></td>
				
			</tr>
		</table>	
		
		<input type="submit" value="Войти">
	</form>
	<?= $msg; ?>
	 <br><a href="index.php">Главная</a>
</body>
</html>