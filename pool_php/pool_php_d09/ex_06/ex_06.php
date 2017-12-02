<?php
function remove_cookie($name)
{
	if(is_string($name) && isset($_COOKIE[$name]))
	{
		setcookie($name,null, 0);
	}
}
?>