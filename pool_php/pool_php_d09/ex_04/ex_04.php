<?php
function remove_session()
{
	session_unset();
	session_destroy();
	session_reset();
}
?>