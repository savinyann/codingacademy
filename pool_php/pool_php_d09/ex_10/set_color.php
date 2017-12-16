<!DOCTYPE html>
<html>
	<head>
		<title></title>
	</head>
	<body>
		<?php
		if(isset($_POST["background"]))
		{
			if(preg_match("/^\#[0-9A-Fa-f]{6}$/", $_POST["background"]))
			{
				setcookie("background", $_POST["background"], time() + 300);
				header("Location: show_color.php");
				exit();
			}
			switch ($_POST["background"])
			{
			case "white":
			case "black":
			case "blue":
			case "red":

			default:
			if(preg_match("/^\#[0-9A-Fa-f]{6}/", $_POST["background"]) == 1)
			{
				setcookie("background", $_POST["background"], time() + 300);
			}
			else
			{
				echo "Invalid color<br>";
				setcookie("background", NULL, 0);
			}
				break;
			}
		}
		echo '
		<form method="post">
			<p><label for="Name">Name : </label>
			<input type="text" value="background" name="background" id="Name"/></p>
			<p><input type="submit" value="Submit"></p>
		</form>
		';
		?>

	</body>
</html>