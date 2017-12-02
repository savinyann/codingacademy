<?php

header("Content-Type: application/json; charset=UTF-8");
include_once "class_query.php";



if($_SERVER["REQUEST_METHOD"] == "POST")
{
	for ($i=0; $i < count($_POST["note"]); $i++)
	{ 
		$query = "INSERT INTO notes (name) VALUES (?)";
		$variable = array($_POST["note"][$i]);
		$SQL = new Query($query, $variable);
		$SQL->SQLquery();
	}


	for ($i=0; $i < count($_POST["email"]); $i++)
	{ 
		$query = "INSERT INTO email (email) VALUES (?)";
		$variable = array($_POST["email"][$i]);
		$SQL = new Query($query, $variable);
		$SQL->SQLquery();
	}


	for ($i=0; $i < count($_POST["todo"]); $i++)
	{ 
		$query = "INSERT INTO todo (name) VALUES (?)";
		$variable = array($_POST["todo"][$i]);
		$SQL = new Query($query, $variable);
		$SQL->SQLquery();

		$query = "SELECT id FROM todo WHERE name = ?";
		$SQL = new Query($query, $variable);
		$id = $SQL->SQLquery()[0]["id"];
		$i++;

		$query = "INSERT INTO tag (name, todo_id) VALUES (?,?)";
		$variable = array($_POST["todo"][$i],$id);
		$SQL = new Query($query, $variable);
		$SQL->SQLquery();
	}
}


if($_SERVER["REQUEST_METHOD"] == "GET")
{
	if($_GET["behaviour"] == "import_todo")
	{
		$query = "SELECT name FROM todo";
		$SQL = new Query($query);
		$all_todo = $SQL->SQLquery();
		$my_encoded_all_todo = json_encode($all_todo);
		echo $my_encoded_all_todo;
	}

	if($_GET["behaviour"] == "todo")
	{
		$query = "SELECT name FROM todo WHERE id=2";
		$SQL = new Query($query);
		$todo = $SQL->SQLquery()[0];
		$my_encoded_todo = json_encode($todo);
		echo $my_encoded_todo;
	}

	if($_GET["behaviour"] == "name")
	{
		$my_name["name"] = "Yann";

		$my_encoded_name = json_encode($my_name);
		echo $my_encoded_name;
	}
}

?>