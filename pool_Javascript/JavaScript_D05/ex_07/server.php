<?php

header("Content-Type: application/json; charset=UTF-8");
include_once "class_query.php";

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