<?php 
namespace m;

class BaseModel 
{
	protected $db;
	protected $table;
	protected $pk;

	public function __construct()
	{
		$this->db = DB::Instance();
	}

	public function all() {
		$query = $this->db->prepare("SELECT * FROM {$this->table}");
		$query->execute();

		if ($query->errorCode() != \PDO::ERR_NONE) {
			$info = $query->errorInfo();
			echo implode('<br>', $info);
			exit();
		}

		return $query->fetchAll();

	}

	public function get($id) {
		$query = $this->db->prepare("SELECT * FROM {$this->table} WHERE {$this->pk} = :id");
		$params = ['id' => $id];
		$query->execute($params);

		if ($query->errorCode() != \PDO::ERR_NONE) {
			$info = $query->errorInfo();
			echo implode('<br>', $info);
			exit();
		}

		return $query->fetch();

	}

	public function delete($id) {
		$sql = "DELETE FROM {$this->table}   WHERE {$this->pk} = :id";
		$params = ['id' => $id];
		$query = $this->db->prepare($sql);
		$query->execute($params);

		if ($query->errorCode() != \PDO::ERR_NONE) {
			$info = $query->errorInfo();
			echo implode('<br>', $info);
			exit();
		}

		return true;
	}
}