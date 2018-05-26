<?php 
namespace c;
use m\ArticleModel;
use core\Tmp;
include "m\Auth.php";
class ArticleController extends BaseController
{
	public function indexAction()
	{
		$mArticles = ArticleModel::Instance();
		$articles = $mArticles->all();

		if ($articles ===false) {
			echo "Возникла ошибка";
		} 
		elseif ($articles ==[]) {
			echo "Нет новостей для отображения";
		} 
		$this->content = Tmp::generate('v/v_index.php',[
			'articles' => $articles
		]);
	}

	public function oneAction()
	{
		if (!isset($this->request->get['id'])) {
			$this->get404();
		}
		$article = ArticleModel::Instance()->get($this->request->get['id']);

		if (!$article) {
			$this->get404();
		}
		
		$this->content = Tmp::generate('v/v_article.php', [
										'id_news' => $this->request->get['id'],
										'title' => $article['title'],
										'content' => $article['content'],
										'dt' => $article['dt'],
										'auth' => $this->auth
		]);

	}
}