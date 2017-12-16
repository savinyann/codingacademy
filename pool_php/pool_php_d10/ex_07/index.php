<?php
include_once "db_pdo.php";
include_once "SQLquery.php";
session_start();

if(isset($_SESSION["name"]))
{
	echo "Hello ".$_SESSION["name"];
}
elseif(isset($_COOKIE["name"]))
{
	echo "Hello ".$_COOKIE["name"];
	$_SESSION["name"] = $_COOKIE["name"];
}
else
{
	header("Location: login.php");
}
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<form method="post" action="logout.php">
		<p><input type="submit" value="Logout"></p>
	</form>

	<form method="post" action="modify_account.php">
		<p><input type="submit" value="Settings"></p>
	</form>

<?php
if($_SESSION["user"]["is_admin"] == 1)
{
echo '
	<form method="post" action="admin.php">
	<p><input type="submit" value="Admin settings"></p>
	</form>
	<form method="post" action="newsletter.php">
	<p><input type="submit" value="Create newsletter"></p>
	</form>';
}

	$gecko = connect_db("gecko");
	$query = "SELECT news.title, news.content, users.name FROM news INNER JOIN users on news.author_id = users.id ORDER BY email";;
	$res = SQLquery($gecko, $query);
	$news = $res->fetchAll();
	foreach ($news as $key => $value)
	{
		echo '<article>'.$value["content"].', created by'.$value["name"].'.</article>';
	}
?>
</body>
</html>