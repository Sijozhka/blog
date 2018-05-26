<?php 
namespace core;

class App
{
	private $request;

	public function __construct(Request $request)
	{
		$this->request = $request;
		

	}

	public function go()
	{
		$params = $this->getRoutByRequest();

		if (!$params) {
			$params = $this->getRoutByParams('default');
		}
		$ctrl = new $params['controller']($this->request);
		$action = $params['action'];

		$ctrl->$action();
		$ctrl->render();
	}

	private function getRoutByRequest()
	{
		return isset($this->routs()[$this->request->rout]) ? $this->routs()[$this->request->rout] : false;
	}

	private function getRoutByParams($rout)
	{
		return isset($this->routs()[$rout]) ? $this->routs()[$rout] : false;
	}

	private function routs()
	{
		return [
			'/' => [
				'controller' => 'c\ArticleController',
				'action' => 'indexAction'
				
			],
			'/article' => [
				'controller' => 'c\ArticleController',
				'action' => 'oneAction'
			
			],
			'default' => [
				'controller' => 'c\BaseController',
				'action' => 'get404'
			]
		];
	}
}