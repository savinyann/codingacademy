<?php

include_once __DIR__."/../Config/db.php";

Class ArticleModel
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

	

	public function Create_Article($article)
	{
		$query = "INSERT INTO articles (title, content, creator_id, category_id, creation_date, modification_date) VALUES (?,?,?,?,NOW(), NOW())";
		$variable = array($article["title"], $article["content"],$article["creator_id"], $article["category_id"]);
		$this->_SQL->SQLquery($query, $variable);


		foreach ($article["tags"] as $key => $value)
		{
			$query ="INSERT INTO tags (name, article_id) VALUES (?,(SELECT id FROM articles WHERE title = ? AND content = ?))";
			$variable = array($value, $article["title"], $article["content"]);
			$this->_SQL->SQLquery($query, $variable);
		}
	}


	public function Read_Articles($user)
	{
		$query = "SELECT articles.id, articles.title, articles.content, categories.name AS category, articles.creation_date, articles.modification_date FROM articles INNER JOIN categories ON categories.id = articles.category_id WHERE creator_id = ? ORDER BY creation_date desc";
		$variable = array($user["id"]);
		$myArticles = $this->_SQL->SQLquery($query, $variable);

		$tags = array();
		foreach ($myArticles as $key => $value)
		{
			$query = "SELECT name FROM tags WHERE article_id = ?";
			$variable = array($value["id"]);
			$tags[$key] = $this->_SQL->SQLquery($query, $variable);
		}

		foreach ($tags as $key => $value)
		{
			$first = TRUE;
			$myArticles[$key]["tags"] = "";
			foreach ($value as $subkey => $subvalue)
			{
				$myArticles[$key]["tags"] .= ($first) ? "" : " ";
				$myArticles[$key]["tags"] .= $subvalue["name"];
				$first = FALSE;
			}
		}
		return($myArticles);
	}



	public function Edit_Article($article)
	{
		$query = "UPDATE articles SET title = ?, content = ?, category_id = ?, modification_date = NOW() WHERE id = ?";
		$variable = array($article["title"], $article["content"], $article["category_id"], $article["id"]);
		$check = $this->_SQL->SQLquery($query, $variable);

		foreach ($article["tags"] as $key => $value)
		{
			$query = "INSERT INTO tags (name, article_id) VALUES (?,?)";
			$variable = array($value, $article["id"]);
			$this->_SQL->SQLquery($query, $variable);
		}
		if($check == -1)
			return("An error has occured.");
		return("modification(s) has been applied.");
	}


	public function Delete_Article($article)
	{
		$query = "DELETE FROM articles WHERE id = ?";
		$variable = array($article["id"]);
		$check_article = $this->_SQL->SQLquery($query, $variable);

		$query = "DELETE FROM COMMENTS WHERE article_id = ?";
		$variable = array($article["id"]);
		$check_comment = $this->_SQL->SQLquery($query, $variable);

		$query = "DELETE FROM tags WHERE article_id = ?";
		$variable = array($article["id"]);
		$check_tags = $this->_SQL->SQLquery($query, $variable);

		if($check_article == -1)// || $check_tags == -1 || $check_comment == -1)
			return("An error has occured.");
		return("Article ".$article["id"].", its tags and its comments has been deleted.");
	}
}
?>