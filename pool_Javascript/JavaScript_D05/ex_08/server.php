<?php

header("Content-Type: application/json; charset=UTF-8");
include_once "class_query.php";



if($_GET["behaviour"] == "import_todo")
{
	$query = "SELECT todo.name, tag.name AS tag FROM todo INNER JOIN tag ON todo.id = tag.todo_id ORDER BY todo.name";
	$SQL = new Query($query);
	$all_todo = $SQL->SQLquery();
	
	//var_dump($all_todo);
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

?>