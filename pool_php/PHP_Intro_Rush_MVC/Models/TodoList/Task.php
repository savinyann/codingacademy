<?php
include_once "/home/yann/Rendu/PHP_Intro_Rush_MVC/Models/Db.php";

class Task
{
	private $tasks;

	public function __construct()
	{
		$query = "SELECT * FROM tasks";
		$SQL = new Query($query);
		$this->tasks = $SQL->SQLquery();
	}


	public function get_tasks()
	{
		return($this->tasks);
	}


	public function get_task($id)
	{
		foreach ($this->tasks as $key => $value)
		{
			if($value["id"] == $id)
			{
				return($value);
			}
		}
	}


	public function post_task($title, $description = NULL)
	{
		$query = "INSERT INTO tasks (title, description, creation_date) VALUES (?,?,NOW())";
		$variable = array($title, $description);
		$SQL = new Query($query, $variable);
		$SQL->SQLquery();
	}


	public function put_task($id, $title = NULL, $description = NULL)
	{
		if(($title != NULL || $title != "") && ($description != "" || $description != NULL))
		{
			$query = "UPDATE tasks SET title = ?, description = ?, edition_date = NOW() WHERE id = ?";
			$variable = array($title, $description, $id);
			$SQL = new Query($query, $variable);
			$SQL->SQLquery();
		}
		elseif($title != NULL || $title != "")
		{
			$query = "UPDATE tasks SET title = ?, edition_date = NOW() WHERE id = ?";
			$variable = array($title, $id);
			$SQL = new Query($query, $variable);
			$SQL->SQLquery();	
		}
		elseif($description != NULL || $description != "")
		{
			$query = "UPDATE tasks SET description = ?, edition_date = NOW() WHERE id = ?";
			$variable = array($description, $id);
			$SQL = new Query($query, $variable);
			$SQL->SQLquery();	
		}
	}


	public function delete_task($id)
	{
		$query = "DELETE FROM tasks WHERE id = ?";
		$variable = array($id);
		$SQL = new Query($query, $variable);
		$SQL->SQLquery();
	}
}

/*
$echo = new Task();
echo "task1\n";
$echo->put_task(2, "echo", "log");
*/
?>