<?php

/* ~~~~~~~Does everything it has to do ~~~~~~~*/


include_once "WriterController.php";
include_once __DIR__."/../Models/CategoryModel.php";

Class AdminController extends WriterController
{
	private $_users;
	private $_userClass;
	private $_categoryClass;
	protected $_categories;
	protected static $instance;
	protected $userCreateForm;
	protected $userEditForm;
	protected $categoryEditForm;
	protected $categoryCreateForm;


	private function __clone(){}
	protected function __construct($request)
	{
		if(intval($_SESSION["user"]["group"]) < 2)
		{
			$_SESSION["user"]["forbidden"] = "You are not allowed to see this. You need to be an admin. If you used to be one of them, and don't know why you are not anymore, please contact an admin.";
			header("Location: ../../PHP_Rush_MVC/forbidden");
		}
		parent::__construct($request);
		$this->_userClass = UserModel::getInstance($request);
		$this->_categoryClass = CategoryModel::getInstance($request);
		$this->_categories = $this->_categoryClass->Read_Category();

		foreach ($this->_userClass->Read_User() as $key => $value)
		{
			$this->_users[$key] = $value;
			$this->_users[$key]["group"] = Support::FormatGroupFromDB($value["group"]);
			$this->_users[$key]["status"] = Support::FormatStatusFromDB($value["status"]);
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


	public function aside()
	{
		parent::aside();
		$this->render("AdminAside");
	}


	public function index()
	{
		parent::index();
	}


	public function Create_User($user = NULL)
	{
		if(isset($_POST["username"]))
		{
			$user["username"] = $_POST["username"];
			$user["email"] = $_POST["email"];
			$user["password"] = $_POST["password"];
			$user["password_confirmation"] = $_POST["password_confirmation"];
			$user["group"] = $_POST["group"];

			$error["username"] = Support::CheckUsername($user["username"]);
			$error["password"] = Support::CheckPassword($user["password"], $user["password_confirmation"]);
			$error["email"] = Support::CheckEmail($user["email"]);
			

			$has_error = FALSE;
			foreach ($error as $key => $value)
			{
				if($value != 1)
				{
					$this->message[$key] = $value;
					$has_error = TRUE;
				}
			}
			if($has_error == FALSE)
			{
				$user["password"] = password_hash($user["password"], PASSWORD_DEFAULT);
				$user = Support::secure_input($user);
				$this->message["Model"] = $this->_userClass->Create_User($user);
			}
		}
		$this->New_User_Form();
	}


	public function New_User_Form()
	{
		$form = array();

		$form["username"] = "Username";
		$form["email"] = "Email";
		$form["password"] = "Password";
		$form["password_confirmation"] = "password_confirmation";
		$form["group"][0] = array("0","User");
		$form["group"][1] = array("1","Writer");
		$form["group"][2] = array("2","Admin");

		$this->userCreateForm = FormGenerator::form($form, "Create User");
		$this->render("AdminCreateUser");
	}


	public function getUserCreateForm()
	{
		return($this->userCreateForm);
	}


	public function Read_User($user = NULL)
	{
		$this->render("AdminReadUser");
	}


	public function getUsers()
	{
		return($this->_users);
	}


	public function Edit_User()
	{
		$user_id = $this->request->getParams()[0];
		foreach ($this->_users as $key => $value)
		{
			if($value["id"] == $user_id)
			{
				$edit_user_key = $key;
				$old_user = $value;
			}
		}

		if(isset($_POST["username"]))
		{
			$user = array();
			$user = $old_user;
			$user["id"] = $old_user["id"];
			$user["username"] = ($_POST["username"] != "") ? $_POST["username"] : $old_user["username"];
			$user["password"] = ($_POST["password"] != "") ? $_POST["password"] : "";
			$user["password_confirmation"] = ($_POST["password_confirmation"] != "") ? $_POST["password_confirmation"] : "";
			$user["email"] = ($_POST["email"] != "") ? $_POST["email"] : $old_user["email"];
			$user["group"] = ($_POST["group"] != "") ? $_POST["group"] : Support::FormatGroupFromDB($old_user["group"]);
			$user["status"] = ($_POST["status"] != "") ? $_POST["status"] : Support::FormatStatusFromDB($old_user["status"]);

			$error["username"] = Support::CheckUsername($user["username"]);
			$error["password"] = ($user["password"] != "") ? Support::CheckPassword($user["password"], $user["password_confirmation"]) : TRUE;
			$error["email"] = Support::CheckEmail($user["email"]);

			$user = Support::secure_input($user);
			$has_error = FALSE;
			foreach ($error as $key => $value)
			{
				if($value != 1)
				{
					echo ($value."\n");
					$has_error = TRUE;
				}
			}

			if($has_error == FALSE)
			{
				$user["password"] = ($user["password"] != "") ? password_hash($user["password"], PASSWORD_DEFAULT) : "";
				echo("<br><br>");
				$this->message["Model"] = $this->_userClass->Edit_User($user);
				if($this->message["Model"] == "User id#".$user["id"]." has been modified.")
				{
					$user["status"] = Support::FormatStatusFromDB($user["status"]);
					$user["group"] = Support::FormatGroupFromDB($user["group"]);
					$this->_users[$edit_user_key] = $user;
				}
			}
		}
		$this->Edit_User_Form($this->_users[$edit_user_key]);
	}


	public function Edit_User_Form($user)
	{
		$form = array();

		$form["username"] = "Username";
		$form["email"] = "Email";
		$form["password"] = "Password";
		$form["password_confirmation"] = "password_confirmation";
		$form["group"][0] = array("0","User");
		$form["group"][1] = array("1","Writer");
		$form["group"][2] = array("2","Admin");
		$form["status"][0] = array("1", "Actif");
		$form["status"][1] = array("0", "Inactif");

		$val = array();
		$val["username"] = $user["username"];
		$val["email"] = $user["email"];

		$this->userEditForm = FormGenerator::form($form, "Edit User", NULL, $val);
		$this->render("AdminEditUser");
		$this->render("AdminReadUser");
	}



	public function Delete_User()
	{
		$user["id"] = $this->request->getParams()[0];
		$this->message["Model"] = $this->_userClass->Delete_User($user);
		if($this->message["Model"] == "User id#".$user["id"]." has been deleted.")
		{
			foreach ($this->_users as $key => $value)
			{
				if($value["id"] == $user["id"])
				{
					$deleted = $key;
				}
			}
			unset($this->_users[$deleted]);
		}
		$this->render("AdminReadUser");
	}

	public function Category_Management()
	{

		if(isset($this->request->getParams()[0]))
		{
			$param = $this->request->getParams()[1];
			if($param == "delete")
			{
				$this->Delete_Category();
			}
			if($param == "edit")
			{
				$this->Edit_Category();
			}
		}
		$this->Create_Category();
		$this->Read_Category();
	}


	private function Read_Category()
	{
		$this->render("ReadCategory");
	}


	private function Create_Category()
	{
		if(isset($_POST["name"]))
		{
			$category["name"] = $_POST["name"];

			$error["category"] = Support::CheckCategory($category["name"]);

			$has_error = FALSE;
			foreach ($error as $key => $value)
			{
				if($value != 1)
				{
					$this->message[$key] = $value;
					$has_error = TRUE;
				}
			}

			if($has_error == FALSE)
			{
				$this->message["Model"] = $this->_categoryClass->Create_Category($category);
			}
			if($this->message["Model"] == "Category created.")
			{
				$this->_categories[] = $category;
			}
		}
		$this->New_Category_Form();
	}


	private function Edit_Category()
	{
		$category["id"] = $this->request->getParams()[0];
		foreach ($this->_categories as $key => $value)
		{
			if($value["id"] == $category["id"])
			{
				$category_key = $key;
				$category = $value;
			}
		}
		if(isset($_POST["name_edited"]))
		{
			$category["name"] = ($_POST["name_edited"] != "") ? $_POST["name_edited"] : $category["name"];

			$error["category"] = Support::CheckCategory($category["name"]);

			$has_error = FALSE;
			foreach ($error as $key => $value)
			{
				if($value != 1)
				{
					$this->message[$key] = $value;
					$has_error = TRUE;
				}
			}

			if($has_error == FALSE)
			{
				$this->message["Model"] = $this->_categoryClass->Edit_Category($category);
			}
			if($this->message["Model"] == "Category edited.")
			{
				$this->_categories[$category_key] = $category;
			}
		}
		if(!isset($_POST["name_edited"]))
			$this->Edit_Category_Form($category);
	}


	private function New_Category_Form()
	{
		$form = array();
		$form["name"] = "Category";
		$this->categoryCreateForm = FormGenerator::form($form, "Add Category");
		$this->render("CreateCategory");
	}


	private function Edit_Category_Form($category)
	{
		$form = array();
		$form["name_edited"] = "Category";

		$val = array();
		$val["name_edited"] = $category["name"];
		$this->categoryEditForm = FormGenerator::form($form, "Edit Category", NULL, $val);
		$this->render("EditCategory");
	}


	private function Delete_Category()
	{
		$category["id"] = $this->request->getParams()[0];
		foreach ($this->_categories as $key => $value)
		{
			if($value["id"] == $category["id"])
			{
				$category_key = $key;
				$category = $value;
			}
		}
		if(isset($_POST["delete_confirm"]))
		{
			if($_POST["delete_confirm"] == "TRUE")
			{
				$this->message["Model"] = $this->_categoryClass->Delete_Category($category);
			}
			if($this->message["Model"] == "Category deleted.")
			{
				unset($this->_categories[$category_key]);
			}
		}
		if($this->message["Model"] != "Category deleted.")
			$this->render("CategoryDelete");
	}


	public function getCategoryEditForm()
	{
		return($this->categoryEditForm);
	}


	public function getCategoryCreateForm()
	{
		return($this->categoryCreateForm);
	}

	public function getCategory()
	{
		return($this->_categories);
	}



}

//echo("<br>[AdminController]: I am here, ready to serve you !<br>");
/*
$user = array();
$user["id"]= "3";
$user["username"] = "Yann";
$user["password"] = "1234";
$user["email"] = "SavinYann@hotmail.com";
$user["group"] = 1;
$user["status"] = 1;

$new_user = array();
$new_user["id"] = 10;
$new_user["username"] = "GiZZette";
$new_user["password"] = "richarde";
$new_user["password_confirmation"] = "richarde";
$new_user["email"] = "renee@free.ren";
$new_user["group"] = "user";
$new_user["status"] = "active";

$yann = AdminController::getInstance($user);
$yann->Edit_User($new_user);
//$yann->Delete_User($new_user);
*/
?>