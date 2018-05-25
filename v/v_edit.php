	<div class="post">
		<h1><?=$msg2 ?></h1>
		<form action="" method="post">
			<table>
				<tr>
					<td><label for="title">Заголовок : </label></td>
					<td><input type="text" name="title" value="<?=$title ?>"></td>
				</tr>
				<tr>
					<td><label for="content">Текст : </label></td>
					<td><textarea name="content" ><?=$content ?></textarea></td>
				</tr>
			</table>	
			
			<input type="submit" value="Сохранить">
			<div style="color:red"><?=$msg ?></div>
		</form>
	</div>	
	<? foreach ($errors as $error) : ?>
		<p style="color:red"><?=$error ?></p>
	<? endforeach; ?>	
	<a href="login.php">Выйти</a>
