<?php 


class UsersModel
{
	protected $db;

	public function __construct($db)
	{
		$this->db = $db;
	}


	public function all() {
		$query = $this->db->prepare("SELECT * FROM users ORDER BY dt DESC");
		$query->execute();

		if ($query->errorCode() != PDO::ERR_NONE) {
			$info = $query->errorInfo();
			echo implode('<br>', $info);
			exit();
		}

		return $query->fetchAll();

	}

	public function get($id) {
		$query = $this->db->prepare("SELECT * FROM users WHERE id_user = :id");
		$params = ['id' => $id];
		$query->execute($params);

		if ($query->errorCode() != PDO::ERR_NONE) {
			$info = $query->errorInfo();
			echo implode('<br>', $info);
			exit();
		}

		return $query->fetch();

	}

	public function add($login, $password) {
		$sql = "INSERT INTO users (login,password) VALUES (:l, :p)";
		$params = ['l' => $login, 'p' => $password];
		$query = $this->db->prepare($sql); 
		$query->execute($params);

		if ($query->errorCode() != PDO::ERR_NONE) {
			$info = $query->errorInfo();
			echo implode('<br>', $info);
			exit();
		}

		return $this->db->lastInsertId();
	}


	public function edit($login, $password, $id) {
		$sql = "UPDATE users SET login = :l,password = :p WHERE id_user = :id";
		$params = ['l' => $login, 'p' => $password, 'id' => $id];
		$query = $this->db->prepare($sql);
		$query->execute($params);
		
		if ($query->errorCode() != PDO::ERR_NONE) {
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


		if ($query->errorCode() != PDO::ERR_NONE) {
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


		if ($query->errorCode() != PDO::ERR_NONE) {
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


		if ($query->errorCode() != PDO::ERR_NONE) {
			$info = $query->errorInfo();
			echo implode('<br>', $info);
			exit();
		}

		return $query->fetch();

	}


	public function delete($id) {
		$sql = "DELETE FROM users  WHERE id_user = :id";
		$params = ['id' => $id];
		$query = $this->db->prepare($sql);
		$query->execute($params);

		if ($query->errorCode() != PDO::ERR_NONE) {
			$info = $query->errorInfo();
			echo implode('<br>', $info);
			exit();
		}

		return true;
	}


	

}
	
