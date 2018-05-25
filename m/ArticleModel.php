<?php 
namespace m;




class ArticleModel extends BaseModel
{
	
	public static $instance;

	public static function Instance()
	{
		if (self::$instance == null) {
			self::$instance = new ArticleModel();
		}
		return self::$instance;
	}

	public function __construct()
	{
		parent::__construct();
		$this->table = 'news';
		$this->pk = 'id_news';
	}

	public function add($title, $content) {
		$sql = "INSERT INTO news (title,content) VALUES (:t, :c)";
		$params2 = ['t' => $title, 'c' => $content];
		$query = $this->db->prepare($sql); 
		$query->execute($params2);

		if ($query->errorCode() != \PDO::ERR_NONE) {
			$info = $query->errorInfo();
			echo implode('<br>', $info);
			exit();
		}

		return $db->lastInsertId();
	}


	public function edit($title, $content, $id) {
		$sql = "UPDATE news SET title = :t,content = :c WHERE id_news = :id";
		$params2 = ['t' => $title, 'c' => $content, 'id' => $id];
		$query = $this->db->prepare($sql);
		$query->execute($params2);
		
		if ($query->errorCode() != \PDO::ERR_NONE) {
			$info = $query->errorInfo();
			echo implode('<br>', $info);
			exit();
		}

		return true;
	}

	public function messages_is_exists($id, $title) {
		$sql = "SELECT * FROM news WHERE title = :t AND id_news != :id";
		$params1 = ['t' => $title, 'id' => $id]; 
		$query = $this->db->prepare($sql);
		$query->execute($params1);


		if ($query->errorCode() != \PDO::ERR_NONE) {
			$info = $query->errorInfo();
			echo implode('<br>', $info);
			exit();
		}

		return $query->fetch();
	}


	public function messages_isset_id($id) {
		$sql = "SELECT * FROM news WHERE id_news = :id";
		$params = ['id' => $id]; 
		$query = $this->db->prepare($sql);
		$query->execute($params);


		if ($query->errorCode() != \PDO::ERR_NONE) {
			$info = $query->errorInfo();
			echo implode('<br>', $info);
			exit();
		}

		return $query->fetch();

	}

	public function messages_isset_title($title) {
		$sql = "SELECT * FROM news WHERE title = :title";
		$params = ['title' => $title]; 
		$query = $this->db->prepare($sql);
		$query->execute($params);


		if ($query->errorCode() != \PDO::ERR_NONE) {
			$info = $query->errorInfo();
			echo implode('<br>', $info);
			exit();
		}

		return $query->fetch();

	}





	private function messages_validate($title, $content) {
		$errors = [];
		if ($title =='') {
			$errors[] = 'Заголовок не может быть пустым!';
		} elseif (mb_strlen($title) < 5) {
			$errors[] = 'Заголовок не может быть короче 5 символов!';
		}

		if ($content == '') {
			$errors[] = 'Текст не может быть пустым!';
		} 

		return $errors;

	}

}
	
