<?php

Class Request
{
	private $url;
	private $controller;
	private $action;
	private $params;

	public function __construct()
	{
		$this->url = isset($_GET["url"]) ? $_GET["url"] : "";
	}


	public function setController($controller = NULL)
	{
		$this->controller = $controller;
	}


	public function setAction($action = "index")
	{
		$this->action = $action;
	}


	public function setParams($params = NULL)
	{
		$this->params = $params;
	}


	public function getURL()
	{
		return($this->url);
	}


	public function getController()
	{
		return($this->controller);
	}


	public function getAction()
	{
		return($this->action);
	}


	public function getParams()
	{
		return($this->params);
	}
}

?>