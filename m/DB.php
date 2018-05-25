<?php 
namespace m;

class DB 
{	
	private static $db;
	public static function Instance()
	{
		if (self::$db == null) {
			self::$db = self::get();
		}
		return self::$db;
	}
	public static function get()
	{
		$db = new \PDO('mysql:host=localhost;dbname=blog','root','');
		$db->exec('SET NAMES UTF8');
		return $db;
	}
}
	
