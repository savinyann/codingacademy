<?php
if(isset($_POST["name"]))
{
	echo "Hello ".$_POST["name"];
}
else
{
	echo
'<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<form method="post">
 <p>Votre nom : <input type="text" name="name" /> <input type="submit" value="Submit"></p>
</form>
</body>
</html>';
}
?>