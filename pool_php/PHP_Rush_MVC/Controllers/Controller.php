<?php
include_once "SupportController.php";
include_once "class_form.php";

class Controller
{
	protected $request;
	protected $message;
	protected static $instance;
	protected $message_print;

	protected function __construct($request = NULL)
	{
		$this->request = $request;
		$this->message_print == FALSE;
	}


	protected function render($view)
	{
		if($this->message_print == FALSE)
		{
			$this->message_print = TRUE;
			$this->render("Message");
		}

		$name = ucfirst($view)."View";
		$file = ROOT.DS."Views".DS.$name.".php";
		include_once $file;
	}

	public function getMessage()
	{
		return($this->message);
	}
}
?>