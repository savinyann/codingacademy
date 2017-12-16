<?php
include_once "SQLquery.php";
include_once "db_pdo.php";
session_start();

if($_SESSION["user"]["is_admin"] == 0)
{
	header("Location: index.php");
}

if(isset($_GET["delete"]))
{
	if($_SESSION["user"]["is_admin"] == 1)
	{
		$gecko = connect_db("gecko");
		$query = "SELECT * FROM users WHERE id = ?";
		$array = array($_GET["delete"]);
		$res = SQLquery($gecko, $query, $array);
		$user_del = $res->fetch();
		if($user_del["is_admin"] == 0)
		{
			$query = "DELETE FROM users WHERE id = ?";
			$array = array($_GET["delete"]);
			SQLquery($gecko, $query, $array);
			echo $user_del["name"]." deleted.<br>";
		}
		else
		{
			echo "You can't delete an administrator.<br>";
		}
	}
}

?>

<!DOCTYPE html>
<html>
<head>
<title></title>
</head>
<body>
	<ul>
		<?php
			$gecko = connect_db("gecko");
			$query = "SELECT id, name FROM users ORDER BY email";
			$res = SQLquery($gecko, $query);
			$users = $res->fetchAll();
			foreach ($users as $key => $value)
			{
				echo '<li><a href="admin.php?delete='.$value["id"].'" >'.$value["name"].'</a></li>';
			}

		?>
	</ul>
	
</body>
</html>