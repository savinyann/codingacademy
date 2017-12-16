<?php

/* ~~~~~~~ TODO: Use SupportController METHOD ~~~~~~~*/

include_once __DIR__."/../Models/UserModel.php";
include_once "CommentController.php";


Class UserController extends CommentController
{
	protected $_user;
	protected $_userModel;
	protected static $instance;
	protected $userEditForm;


	private function __clone(){}
	protected function __construct($request)
	{
		if(!isset($_SESSION["user"]))
		{
			$_SESSION["user"]["forbidden"] = "You are not allowed to see this. You need to be logged.";
			header("Location: ../../PHP_Rush_MVC/forbidden");
		}
		$this->_userModel = UserModel::getInstance($request);
		$this->_user = $this->_userModel->Read_User($_SESSION["user"])[0];

		if($this->_user["status"] == 0)
		{
			$_SESSION["user"]["forbidden"] = "You have been banned by an admin. If you do not know why, or want further explanations, please contact an admin.";
			header("Location: ../../PHP_Rush_MVC/forbidden");
		}
		parent::__construct($request);

	}


	public static function getInstance($request)
	{
		if(!isset(self::$instance))
		{
			self::$instance = new self($request);
		}
		return(self::$instance);
	}


	public function aside()
	{
		$this->render("UserAside");
	}


	public function index()
	{
	}


	public function Edit_Me()
	{
		if($_POST != NULL)
		{
			$user = array();
			$user["id"] = $this->_user["id"];
			$user["username"] = ($_POST["username"] != NULL) ? $_POST["username"] : $this->_user["username"];
			$user["email"] = ($_POST["email"] != NULL) ? $_POST["email"] : $this->_user["email"];
			$user["password"] = ($_POST["password"] != NULL) ? $_POST["password"] : NULL;
			$user["password_confirmation"] = ($_POST["password"] != NULL) ? $_POST["password_confirmation"] : NULL;

			// ----------- Check Input ------------- \\
			$error = array();
			$error["username"] = Support::CheckUsername($user["username"]);
			$error["email"] = Support::CheckEmail($user["email"]);
			$error["password"] = ($user["password"] != NULL) ? Support::CheckPassword($user["password"], $user["password_confirmation"]) : TRUE;
			$user = Support::secure_input($user);
			$error["password_verify"] = ($_POST["current_password"] != NULL) ? (password_verify($_POST["current_password"], $_SESSION["user"]["password"]) ? TRUE : "Incorrect current password.") : "Current password is required to apply modification";

			$has_error = FALSE;
			foreach ($error as $key => $value)
			{
				if($value != 1)
				{
					$has_error = TRUE;
					$this->message [$key] = $value;
				}
			}
			if(!$has_error)
			{
				$user["password"] = password_hash($user["password"], PASSWORD_DEFAULT);
				$this->message["Model"] = $this->_userModel->Edit_User($user);
				if($this->message["Model"] == "Modification have been applied.")
				{
					$_SESSION["user"]["username"] = $user["username"];
					$_SESSION["user"]["email"] = $user["email"];
					$_SESSION["user"]["password"] = $user["password"];
				}
			}
		}
		$this->Edit_Form();
	}


	protected function Edit_Form()
	{
		$form = array();

		$form["username"] = "Name";
		$form["email"] = "Email";
		$form["password"] = "Password";
		$form["password_confirmation"] = "Password confirmation";
		$form["current_password"] = "Current password";
		$this->userEditForm = FormGenerator::form($form, "Apply change");
		$this->render("UserEdit");
	}


	public function getUserEditForm()
	{
		return($this->userEditForm);
	}


	public function Delete_Me()
	{
		if(isset($_POST["delete"]) && $_POST["delete"] == "TRUE")
		{
			$this->_userModel->Delete_User($this->_user);
			header("Location: ../../PHP_Rush_MVC/login/logout");
		}
		$this->render("UserDelete");
	}
}
?>