<?php
/* ~~~~~~~Does everything it has to do ~~~~~~~*/

include_once "UserController.php";
include_once __DIR__."/../Models/ArticleModel.php";
include_once __DIR__."/../Models/CategoryModel.php";
//include_once __DIR__."/../Views/Articles.php";
//include_once __DIR__."/../Models/WriterModels.php";

Class WriterController extends UserController
{
	protected $_articleClass;
	protected $_myArticles;
	protected $_myArticle;
	protected $_categories;
	protected $articleCreateForm;
	protected $articleEditForm;
	protected static $instance;
	protected $match;


	private function __clone(){}
	protected function __construct($request)
	{
		if(intval($_SESSION["user"]["group"]) < 1)
		{
			$_SESSION["user"]["forbidden"] = "You are not allowed to see this. You need to be a writer or an admin. If you used to be one of them, and don't know why you are not anymore, please contact an admin.";
			header("Location: ../../PHP_Rush_MVC/forbidden");
		}
		parent::__construct($request);

		$this->_articleClass = ArticleModel::getInstance($request);
		$this->_myArticles = $this->_articleClass->Read_Articles($this->_user);
		$this->_categories = CategoryModel::getInstance()->Read_Category();
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
		$this->render("WriterAside");
	}


	public function index()
	{
		parent::index();

	}


	public function Create_My_Article()
	{
		if(isset($_POST["title"]))
		{
			$article = array();
			$article["title"] = $_POST["title"];
			$article["content"] = $_POST["article_content"];
			$article["creator_id"] = $this->_user["id"];
			$article["category_id"] = $_POST["category"];
			$article["tags"] = explode(" ", $_POST["tags"]);

			$error = array();
			$error["title"] = Support::CheckTitle($article["title"]);

			$has_error = FALSE;
			foreach ($error as $key => $value)
			{
				if($value != TRUE)
				{
					echo("VarDump = ");
					var_dump($value);
					$has_error = TRUE;
					$this->message [$key] = $value;
				}
			}

			if(!$has_error)
			{
				$article = Support::secure_input($article);
				$this->_articleClass->Create_Article($article);
			}

		}
		$this->New_Article_Form();
	}


	private function New_Article_Form()
	{
		$form = array();

		$form["title"] = "Title";
		$form["category"] = $this->_categories;
		$form["tags"] = "Tags";
		$form["article_content"] = "Content";
		$this->articleCreateForm = FormGenerator::form($form, "Create Article");
		$this->render("WriterCreateArticle");
	}


	public function getArticleCreateForm()
	{
		return($this->articleCreateForm);
	}


	public function getMyArticles()
	{
		return($this->_myArticles);
	}


	public function getMyArticle()
	{
		return($this->_myArticle);
	}


	public function Read_My_Articles()
	{
		if(NULL !== $this->request->getAction() && $this->request->getAction() == "Read_My_Articles" && !isset($this->request->getParams()[0]))
		{
			$this->render("WriterSearchArticles");
		}
		if(isset($this->request->getParams()[0]))
		{
			$this->_myArticle["id"] = $this->request->getParams()[0];

			foreach ($this->_articles as $key => $value)
			{
				if($value["id"] == $this->_myArticle["id"])
				{
					$this->_myArticle = $this->_articles[$key];
				}
			}
			$this->render("WriterReadArticle");
		}
		else if(isset($_POST["article"]) && $_POST["article"] != "")
		{
			$article["title"] = $_POST["article"];
			$this->match = array();
			foreach ($this->_myArticles as $key => $value)
			{
				if(strpos(strtolower($value["title"]), strtolower($article["title"])) !== FALSE)
				{
					array_push($this->match, $value);
				}
			}
			$this->render("WriterReadMatches");
		}
		else
		{
			$this->render("WriterReadArticles");
		}
	}


	public function getMatch()
	{
		return($this->match);
	}


	public function Edit_My_Article()
	{
		$article_id = $this->request->getParams()[0];
		foreach ($this->_myArticles as $key => $value)
		{
			if($value["id"] == $article_id)
			{
				$old_article = $value;
			}
		}
		if(isset($_POST["title"]))
		{
			$article = array();
			$article["id"] = $old_article["id"];
			$article["title"] = ($_POST["title"] != "") ? $_POST["title"] : $old_article["title"];
			$article["content"] = ($_POST["content"] != "") ? $_POST["content"] : $old_article["content"];
			$article["category_id"] = ($_POST["category"] != "") ? $_POST["category"] : $old_article["category"];

			$error["title"] = Support::CheckTitle($article["title"]);

			$article["tags"] = array();
			foreach (explode(" ",$_POST["tags"]) as $key => $value)
			{
				$article["tags"][$key] = $value;
			}

			$has_error = FALSE;
			foreach ($error as $key => $value)
			{
				if($value != 1)
				{
					$this->message[$key] = $value;
					$has_error = TRUE;
				}
			}

			if(!$has_error)
			{
				$article = Support::secure_input($article);
				$this->message["Model"] = $this->_articleClass->Edit_Article($article);
			}
		}
		$this->Edit_Article_Form($old_article);
	}


	public function Edit_Article_Form($article)
	{
		$form = array();

		$form["title"] = "Title";
		$form["category"] = $this->_categories;
		$form["tags"] = "Tags";
		$form["content"] = "Content";

		$val = array();
		$val["title"] = $article["title"];
		$val["content"] = $article["content"];
		$this->articleEditForm = FormGenerator::form($form, "Edit Article", NULL, $val);
		$this->render("WriterEditArticle");
		$this->render("WriterReadArticles");
	}

	public function getArticleEditForm()
	{
		return($this->articleEditForm);
	}

	public function Delete_My_Article()
	{
		$article["id"] = $this->request->getParams()[0];
		$this->message["Model"] = $this->_articleClass->Delete_Article($article);
		if($this->message["Model"] == "Article ".$this->request->getParams()[0].", its tags and its comments has been deleted.")
		{
			foreach ($this->_myArticles as $key => $value)
			{
				if($value["id"] == $article["id"])
				{
					$deleted = $key;
				}
			}
			unset($this->_myArticles[$deleted]);
		}
		$this->render("WriterReadArticles");
	}
}

/*
$user = array();
$user["id"]=1;
$yann = WriterController::getInstance($user);
$MyArticles = $yann->Read_My_Articles();
echo "myArticles\n";
var_dump($MyArticles);



$article = array();
$article["id"] = 16;
$article["title"] = "Un CINQUIÈME chaton tue 1023 pompiers";
$article["content"] = "Le chaton Coeur-de-Lion était coincé...";
$article["creator_id"] = 2;
$article["category_id"] = 3;
$article["tags"] = array("electricité", "baobab");
$yann->Create_My_Article($article);
//$yann->Delete_My_Article($article);
*/
?>