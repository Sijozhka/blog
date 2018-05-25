
	<h1>Список новостей</h1>
	<table>
		<? foreach ($articles as $one) : ?>

			<tr>
				<td><?=$one["dt"] ?></td>
				<td><a href="article.php?id=<?=$one['id_news']?>"><?=$one["title"] ?></a></td>
				
			</tr>
		<? endforeach ?>
	</table>
	<? if ($_SESSION['auth'] != true)  : ?>
			<a href="login.php">Войти</a>
	<? else : ?>
			<a href="add.php">Добавить новость</a><br>
			<a href=\"login.php\">Выйти</a>
	<? endif; ?>
