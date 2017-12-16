<?php
include_once "/home/yann/Rendu/PHP_Intro_Rush_MVC/Models/TodoList/Task.php";

class TaskController
{
	private $title;
	private $description;
	private $tasks;

	function __construct()
	{
		$tasks = new Task();
		$this->tasks = $tasks->get_tasks();
		$this->title = (isset($_POST["task_title"])) ? $this->secure_input($_POST["task_title"]) : NULL;
		$this->description = (isset($_POST["task_description"])) ? $this->secure_input($_POST["task_description"]) : NULL;
	}


	private function secure_input($data)
	{
		if($data = "")
		{
			$data = trim($data);
			$data = stripslashes($data);
			$data = htmlspecialchars($data);
			return($data);
		}
	}


	public function getFromTask()
	{
		$tasks = array();
		foreach ($this->tasks as $key => $task)
		{
			$tasks[$key]["title"] = htmlspecialchars($task["title"]);
			$tasks[$key]["description"] = nl2br(htmlspecialchars($task["description"]));
		}
		return($tasks);
	}


	public function sendToTask()
	{
		$sendData = new Task();
		$sendData->post_task($this->title, $this->description);
	}
}

include_once "/home/yann/Rendu/PHP_Intro_Rush_MVC/Views/TodoList/tasks.php";
?>