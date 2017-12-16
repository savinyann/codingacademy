<?php
include_once "Controller.php";

Class NotfoundController extends Controller
{
	protected function __clone(){}
	protected function __construct($request)
	{
		parent::__construct($request);
	}


	public function index()
	{
		$this->render("Notfound");
	}


	public static function getInstance($request)
	{
		if(!isset(self::$instance))
		{
			self::$instance = new self($request);
		}
		return(self::$instance);
	}
}

?>