<?php
include_once "Controller.php";

class ForbiddenController extends Controller
{
	protected static $instance;
	protected $request;


	protected function __clone(){}
	protected function __construct($request)
	{
		$this->request = $request;
	}

	public function index()
	{
		$this->message["forbidden"] = $_SESSION["user"]["forbidden"];
		$this->render("forbidden");
		if($_SESSION["user"]["status"] == 0)
		{
			session_unset();
			session_destroy();
			session_reset();
			session_start();
		}
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