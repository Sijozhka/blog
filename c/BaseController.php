<?php 
namespace c;

use core\Users;
use core\Tmp;

class BaseController
{
	protected $title;
	protected $content;
	protected $auth;

	public function __construct()
	{
		$this->title = 'Мой блог';
		$this->auth = Users::is_Auth();
	}

	public function render()
	{
		echo Tmp::generate('v/v_main.php',[
			'title' => $this->title,
			'auth' => $this->auth,
			'content' => $this->content
		]);
	}
	
}