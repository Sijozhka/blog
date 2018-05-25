<?php 
namespace c;
use m\ArticleModel;
use core\Tmp;

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
}