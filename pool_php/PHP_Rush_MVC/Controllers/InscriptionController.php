<?php
/* ~~~~~~~Does everything it has to do ~~~~~~~*/
//include_once __DIR__ . "/../Views/InscriptionView.php";
include_once __DIR__ . "/../Models/UserModel.php";
include_once "SupportController.php";
include_once "Controller.php";
include_once "class_form.php";

class InscriptionController extends Controller
{
	protected $request;
	private $form;


	protected function __construct($request = NULL)
	{
		$this->request = $request;
	}


	public static function getInstance($request = NULL)
	{
		if(!isset(self::$instance))
			{
				self::$instance = new self($request);
			}
			return(self::$instance);
	}


	public function index()
	{
		if(isset($_POST["username"]))
		{
			$error = Support::check_errors($_POST);
			if (count($error) == 0)
			{
				$_POST = Support::secure_input($_POST);
				$_POST["password"] = password_hash($_POST["password"], PASSWORD_DEFAULT);
				$this->message["Model"] = UserModel::getInstance()->Create_User($_POST);

				if($this->message["Model"] == "User created")
				{		
					$_SESSION["new_user"] = "User created";
					header("Location: ../login");
				}
			}
			else
			{
				foreach ($error as $key => $value)
				{
					$this->message[$key] = $value;
				}
			}
		}
		$this->Register_Form();
	}


	private function Register_Form()
	{
		$form = array();

		$form["username"] = "Name";
		$form["email"] = "Email";
		$form["password"] = "Password";
		$form["password_confirmation"] = "Password confirmation";
		
		$this->form = FormGenerator::form($form, "Register");
		$this->render("inscription");
	}


	public function getForm()
	{
		return($this->form);
	}
}

/*
$form = array();
$form["username"] = "Gillès";
$form["email"] = "Gilles_Lebon@gilou.bon";
$form["password"] = "12345678";
$form["password_confirmation"] = "12345678";

$New_user = new InscriptionController();
$New_user->Create_User($form);
*/
?>