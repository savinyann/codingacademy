<?php
function modify_cookie($name, $value)
{
	if(is_string($name) && isset($_COOKIE["name"]))
	{
		setcookie($name, $value, time() + 300);
	}
}
?>