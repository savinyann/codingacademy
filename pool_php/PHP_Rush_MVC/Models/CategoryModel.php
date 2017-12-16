<?php

include_once __DIR__."/../Config/db.php";

Class CategoryModel
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

	

	public function Create_Category($category)
	{
		$query = "INSERT INTO categories (name) VALUES (?)";
		$variable = array($category["name"]);
		$check = $this->_SQL->SQLquery($query, $variable);

		if($check == -1)
			return("An error has occured");
		return("Category created.");
	}


	public function Read_Category($category = NULL)
	{
		if($category == NULL)
		{
			$query = "SELECT id, name FROM categories";
			return($this->_SQL->SQLquery($query));
		}
		else
		{
			$query = "SELECT id, name FROM categories WHERE id = ?";
			$variable = array($category["id"]);
			return($this->_SQL->SQLquery($query, $variable));
		}
	}


	public function Edit_Category($category)
	{
		$query = "UPDATE categories SET name = ? WHERE id = ?";
		$variable = array($category["name"], $category["id"]);
		$check = $this->_SQL->SQLquery($query, $variable);

		if($check == -1)
			return("An error has occured");
		return("Category edited.");
	}


	public function Delete_Category($category)
	{
		$query = "DELETE FROM categories WHERE id = ?";
		$variable = array($category["id"]);
		$check = $this->_SQL->SQLquery($query, $variable);

		if($check == -1)
			return("An error has occured");
		return("Category deleted.");
	}
}
?>