<?php
include_once "Controller.php";
include_once __DIR__."/../Models/CommentModel.php";

Class CommentController extends Controller
{
	protected $_articles;
	protected $_article;
	protected $_commentClass;
	protected $commentCreateForm;
	protected $commentEditForm;
	protected $categoryCreateForm;
	protected $searchForm;
	protected $match;

	private function __clone(){}
	protected function __construct($request)
	{
		parent::__construct($request);
		$this->_commentClass = CommentModel::getInstance();
		$this->_articles = $this->_commentClass->Read_Articles();
		
		if($this->request->getAction() == "index")
		{
			$this->Search();
		}
		if($this->request->getAction() == "index")
		{
			$this->render("Articles");
		}
	}


	public function Read_Article()
	{
		$article["id"] = $this->request->getParams()[0];
		foreach ($this->_articles as $key => $value)
		{
			if($value["id"] == $article["id"])
			{
				$this->_article = $value;
			}
		}
		$this->render("Article");
	}


	public function Create_Comment()
	{
		$article["id"] = $this->request->getParams()[0];

		if(isset($_POST["content"]))
		{
			$comment["content"] = $_POST["content"];
			$comment["article_id"] = $this->request->getParams()[0];
			$comment["creator_id"] = $_SESSION["user"]["id"];
			$comment["creator"] = $_SESSION["user"]["username"];
			$comment["creation_date"] = "Few seconds ago.";

			$error["content"] = Support::CheckContent($comment["content"]);

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
				$this->message["Model"] = $this->_commentClass->Create_Comment($comment);
				if($this->message["Model"] = "Your comment has been save.")
				{
					foreach ($this->_articles as $key => $value)
					{
						if($value["id"] == $article["id"])
						{
							$article_key = $key;
						}
					}
				}
				$comment["id"] = "0";
				array_push($this->_articles[$article_key]["comments"], $comment);
			}
		}
		$this->New_Comment_Form();
	}


	public function Edit_Comment()
	{
		$article["id"] = $this->request->getParams()[0];
		$comment["id"] = $this->request->getParams()[1];
		foreach ($this->_articles as $key => $value)
		{
			if($value["id"] == $article["id"])
			{
				$article_key = $key;
				$article = $value;
			}
		}
		foreach ($article["comments"] as $key => $value)
		{
			if($value["id"] == $comment["id"])
			{
				$comment_key = $key;
				$comment = $value;
			}
		}
		if( !isset($comment["creator"]) || $comment["creator"] != $_SESSION["user"]["username"])
		{
			//header("Location: ../../PHP_Rush_MVC/forbidden");
			$this->message["error"] = "You are not allowed to edit this comment. Only its creator can do that. By the way, to see this message, you have to mess with the URL. I probably should ban you for that, you cheater!";
			$article["id"] = $this->request->getParams()[0];
			foreach ($this->_articles as $key => $value)
			{
				if($value["id"] == $article["id"])
				{
					$this->_article = $value;
				}
			}
			$this->render("Article");
		}
		else
		{
			if(isset($_POST["content"]))
			{
				$comment["content"] = ($_POST["content"] != "") ? $_POST["content"] : $comment["content"];

				$error["content"] = Support::CheckContent($comment["content"]);

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
					$comment = Support::secure_input($comment);
					$this->message["Model"] = $this->_commentClass->Edit_Comment($comment);
				}
				if($this->message["Model"] == "Modifications have been applied.")
				{
					$this->_articles[$article_key]["comments"][$comment_key] = $comment;
				}

			}
			$this->Edit_Comment_Form($comment);
		}
	}


	public function Delete_Comment()
	{
		$article["id"] = $this->request->getParams()[0];
		$comment["id"] = $this->request->getParams()[1];
		foreach ($this->_articles as $key => $value)
		{
			if($value["id"] == $article["id"])
			{
				$article_key = $key;
				$article = $value;
			}
		}
		foreach ($article["comments"] as $key => $value)
		{
			if($value["id"] == $comment["id"])
			{
				$comment_key = $key;
				$comment = $value;
			}
		}
		if( !isset($comment["creator"]) || $comment["creator"] != $_SESSION["user"]["username"])
		{
			//header("Location: ../../PHP_Rush_MVC/forbidden");
			$this->message["error"] = "You are not allowed to delete this comment. Only its creator can do that. By the way, to see this message, you have to mess with the URL. I probably should ban you for that, you cheater!";
		}
		else
		{
			$this->message["Model"] = $this->_commentClass->Delete_Comment($comment);
			if($this->message["Model"] == "Comment has been deleted.")
			{
				unset($this->_articles[$article_key]["comments"][$comment_key]);
			}
		}
		$this->Read_Article();
	}


	public function Edit_Comment_Form($comment)
	{
		$form = array();
		$form["content"] = "Content";

		$val = array();
		$val["content"] = $comment["content"];

		$this->commentEditForm = FormGenerator::form($form, "Edit Comment", NULL, $val);
		$this->Read_Article();
		$this->render("CommentEditComment");
	}


	public function New_Comment_Form()
	{
		$form = array();

		$form["content"] = "Content";
		$this->commentCreateForm = FormGenerator::form($form, "Post Comment");
		$this->Read_Article();
		$this->render("CommentCreateComment");
	}


	public function Search()
	{
		if(isset($_POST["search"]) && $_POST["search"] != "")
		{
			$search["search"] = $_POST["search"];
			$search["type"] = $_POST["type"];
			$this->match = array();
			foreach ($this->_articles as $key => $value)
			{
				if(strpos(strtolower($value[$search["type"]]), strtolower($search["search"])) !== FALSE)
				{
					array_push($this->match, $value);
				}
			}
		}
		$this->SearchForm();
		if($this->request->getAction() == "Search")
		{
			$this->render("Match");
		}
	}


	private function SearchForm()
	{
		$form = array();
		$form["search"] = "Search";
		$form["type"] = array();
		$form["type"][0] = array("title", "Title");
		$form["type"][1] = array("creator","Author");
		$form["type"][2] = array("creation_date","Date");
		$form["type"][3] = array("category","Category");
		$form["type"][4] = array("tags","Tag");

		$this->searchForm = FormGenerator::form($form, "Search", "/PHP_Rush_MVC/comment/Search");

		$this->render("Search");
	}


	public function getSearchForm()
	{
		return($this->searchForm);
	}


	public function getMatch()
	{
		return($this->match);
	}


	public function getCommentCreateForm()
	{
		return($this->commentCreateForm);
	}


	public function getCommentEditForm()
	{
		return($this->commentEditForm);
	}


	public function getArticles()
	{
		return($this->_articles);
	}


	public function getArticle()
	{
		return($this->_article);
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