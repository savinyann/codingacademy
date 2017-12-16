<?php
/* ~~~~~~~Does everything it has to do ~~~~~~~*/


// include_once __DIR__ . "/../Views/LoginView.php";
include_once __DIR__ . "/../Config/db.php";
include_once __DIR__ . "/../Models/UserModel.php";
include_once "Controller.php";
include_once "class_form.php";

class LoginController extends Controller
{
	private $_userModel;
	private $form;

	protected function __construct ()
	{
		$this->_userModel = UserModel::getInstance();
	}


	public function index()
	{
		if(isset($_POST["username"]))
		{
			$user_db = $this->_userModel->Read_User($_POST);

			if(count($user_db) == 1)
			{
				if ($user_db[0]["username"] == $_POST["username"] && password_verify($_POST["password"], $user_db[0]["password"]))
				{
					print_r($user_db[0]);
					$_SESSION["user"] = $user_db[0];
					switch ($_SESSION["user"]["group"])
					{
						case 0:
							header("Location: ../../PHP_Rush_MVC/user");
							break;

						case 1:
							header("Location: ../../PHP_Rush_MVC/writer");
							break;

						case 2:
							header("Location: ../../PHP_Rush_MVC/admin");
							break;
						
						default:
							header("Location: ../../PHP_Rush_MVC/forbidden");
							break;
					}
				}
				else
					$this->message["error"] = "Incorrect username and/or password."; // error login : "Invalid  username and/or password."
					//$this->render("login");
			}
			else
			{
				$this->message["error"] = "This account doesn't exists."; // error login : "Invalid  username and/or password."
				
			}
		}

		$this->Register_Form();
	}


	public function logout()
	{
		session_unset();
		session_destroy();
		session_reset();
		session_start();
		header("Location: ../../PHP_Rush_MVC");
	}


	private function Register_Form()
	{
		$form = array();

		$form["username"] = "Nom";
		
		$form["password"] = "Password";
				
		$this->form = FormGenerator::form($form, "Login");
		
		$this->render("login");
	}

	public function getForm()
	{
		return($this->form);
	}

	public static function getInstance($request = NULL)
	{
		if(!isset(self::$instance))
			{
				self::$instance = new self($request);
			}
			return(self::$instance);
	}
}
?>