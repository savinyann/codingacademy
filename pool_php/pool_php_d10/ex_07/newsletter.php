<?php
session_start();
include_once "SQLquery.php";
include_once "db_pdo.php";
include_once "get_user.php";

$valid_title = FALSE;
$valid_content = FALSE;

if(isset($_POST["title"]) && (strlen($_POST["title"]) >= 2 && strlen($_POST["content"] <= 50)))
{
	$valid_title = TRUE;
}
else
{
	echo "Invalid title<br>";
}
if(isset($_POST["content"]))
{
	$valid_content = TRUE;
}
else
{
	echo "Invalid content<br>";
}

if($valid_title == TRUE && $valid_content == TRUE)
{
	$gecko = connect_db("gecko");
	$author = get_user("gecko", "email", $_SESSION["email"]);
	if($author["is_admin"] == 1)
	{
		$query = "INSERT INTO news VALUES (NULL, ?, ?,?,curdate())";
		$array = array($_POST["title"],$_POST["content"],$author["id"]);
		SQLquery($gecko, $query, $array);
		header("Location: index.php");
	}
}
echo '
<form method="post">
	<p style="text-align:center"><label for="title">Title : </label>
	<input type="text" name="title" id="title" minlength="2" style="text-align:center" value="';
	echo (isset($_POST["title"])) ? $_POST["title"] : "";
	echo '"/></p>


	<p><label for="content">Content : </label>
	<textarea name="content" id="content" style="width:100%;height:50%" required ">';
	echo (isset($_POST["content"])) ? $_POST["content"] : "";
	echo '</textarea></p>


	<p><input type="submit" value="Submit"></p>
</form>
</form>
<form action="index.php">
	<p><input type="submit" value="Cancel"></p>
</form>';
?>