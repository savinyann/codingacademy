<?php

Class Dispatcher
{
	private $request;
	private $controller;

	public function __construct()
	{
		$this->request = new Request;
		Router::parse($this->request->getURL(), $this->request);
		echo("<main>");
		$this->controller = $this->load_Controller();
		call_user_func_array(array($this->controller,$this->request->getAction()), $this->request->getParams());
		echo("</main>");

		if(isset($_SESSION["user"]) && (get_class($this->controller) != "NotfoundController" && get_class($this->controller) != "ForbiddenController"))
		{
			echo("<aside>");
			$this->load_aside();
			echo("</aside>");
		}

	}


	private function load_aside()
	{
		switch ($_SESSION["user"]["group"])
		{
			case 0:
				$name = "UserController";
				break;
			case 1:
				$name = "WriterController";
				break;
			case 2:
				$name = "AdminController";
				break;
		}
		$file = ROOT.DS."Controllers".DS.$name.".php";
		include_once $file;
		$controller = $name::getInstance($this->request);
		$controller->aside();
	}


	private function load_Controller()
	{
		if($this->request->getController() != "")
		{
			$name = ucfirst($this->request->getController())."Controller";
			$file = ROOT.DS."Controllers".DS.$name.".php";
		}
		else if(!isset($_SESSION["user"]))
		{
			$name = "LoginController";
			$file = ROOT.DS."Controllers".DS.$name.".php";
		}
		else
		{
			switch ($_SESSION["user"]["group"])
			{
				case "0":
					$name = "UserController";
					break;
				case "1":
					$name = "WriterController";
					break;
				case "2":
					$name = "AdminController";
					break;
				default:
					$name = "ForbiddenController";
					break;
			}
			$file = ROOT.DS."Controllers".DS.$name.".php";
		}
		if(file_exists($file))
		{
			include_once $file;
			if(method_exists($name, $this->request->getAction()))
			{
				return($name::getInstance($this->request));
			}	
			else
			{
				$name = "NotfoundController";
				$file = ROOT.DS."Controllers".DS.$name.".php";
				include_once $file;
				$this->request->setAction("index");
				return($name::getInstance($this->request));
			}
		}
		else
		{
			$name = "NotfoundController";
			$file = ROOT.DS."Controllers".DS.$name.".php";
			include_once $file;
			$this->request->setAction("index");
			return($name::getInstance($this->request));
		}
	}
}

?>