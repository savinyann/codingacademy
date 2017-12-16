<?php
include_once __DIR__."/../Config/db.php";


Class CommentModel
{
	private $_SQL;
	private static $instance;

	private function __clone(){}
	private function __construct()
	{
		$this->_SQL = Query::getInstance();
	}


	public static function getInstance()
	{
		if(!isset(self::$instance))
		{
			self::$instance = new self();
		}
		return(self::$instance);
	}


	public function Read_Articles()
	{
		$query = "SELECT articles.id, articles.title, articles.content, articles.creation_date, articles.modification_date, categories.name AS category, users.username AS creator FROM articles LEFT JOIN categories ON articles.category_id = categories.id LEFT JOIN users ON articles.creator_id = users.id ORDER BY creation_date DESC";
		$articles = $this->_SQL->SQLquery($query);

		$tags = array();
		foreach ($articles as $key => $value)
		{
			$query = "SELECT name FROM tags WHERE article_id = ?";
			$variable = array($value["id"]);
			$tags[$key] = $this->_SQL->SQLquery($query, $variable);
		}

		foreach ($tags as $key => $value)
		{
			$first = TRUE;
			$articles[$key]["tags"] = "";
			foreach ($value as $subkey => $subvalue)
			{
				$articles[$key]["tags"] .= ($first) ? "" : " ";
				$articles[$key]["tags"] .= $subvalue["name"];
				$first = FALSE;
			}
		}

		$comment = array();
		foreach ($articles as $key => $value)
		{
			$query = "SELECT comments.id, comments.content, users.username AS creator, comments.creation_date FROM comments INNER JOIN users ON users.id = creator_id WHERE article_id = ? ORDER BY comments.creation_date asc";
			$variable = array($value["id"]);
			$comments[$key] = $this->_SQL->SQLquery($query, $variable);
		}

		foreach ($comments as $key => $value)
		{
			$articles[$key]["comments"] = $value;
		}
		return($articles);
	}


	public function Create_Comment($comment)
	{
		$query = "INSERT INTO comments (content, article_id, creator_id, creation_date) VALUES (?,?,?,NOW())";
		$variable = array($comment["content"], $comment["article_id"], $comment["creator_id"]);
		$check = $this->_SQL->SQLquery($query, $variable);

		if($check == -1)
			return("An error has occured.");
		return("Your comment has been save.");
	}


	public function Edit_Comment($comment)
	{
		$query = "UPDATE comments SET content = ?, modification_date = NOW() WHERE id = ?";
		$variable = array($comment["content"], $comment["id"]);
		$check = $this->_SQL->SQLquery($query, $variable);

		if($check == -1)
			return("An error has occured.");
		return("Modifications have been applied.");
	}


	public function Delete_Comment($comment)
	{
		$query = "DELETE FROM comments WHERE id = ?";
		$variable = array($comment["id"]);
		$check = $this->_SQL->SQLquery($query, $variable);

		if($check == -1)
			return("An error has occured.");
		return("Comment has been deleted.");
	}
}

?>