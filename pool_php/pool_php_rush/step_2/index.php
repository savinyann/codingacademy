<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<main>
		<?php
		include_once "class_form.php";
		include_once "class_user.php";
		include_once "class_admin.php";
		session_start();
		if(isset($_SESSION["user"]))
		{
			$user = unserialize($_SESSION["user"]);
			echo "Hello ".$user->getUsername();
		}
		else
		{
			header("Location: login.php");
		}

		if($user->getAdmin() == 1)
		{
			new Form ( array(),"Administration", "admin.php");
		}

		?>
		<form method="post" action="logout.php">
			<input type="submit" value="Logout">
		</form>
	</main>
</body>
</html>