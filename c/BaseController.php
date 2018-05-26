<?php 
namespace c;

use core\Users;
use core\Tmp;
use core\Request;

class BaseController
{
	protected $title;
	protected $content;
	protected $auth;
	protected $request;

	public function __construct(Request $request)
	{
		$this->title = 'Мой блог';
		$this->auth = Users::is_Auth();
		$this->request = $request;
	}

	public function get404()
	{
		$this->title = "{$this->title}:: 404 error";
		$this->content = "<h3>Page not found</h3>";
		$this->render();
		die;
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