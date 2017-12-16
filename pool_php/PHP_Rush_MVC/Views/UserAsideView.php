<?php

echo "<div class='hello'> Hello ".$_SESSION["user"]["username"]." !</div>";

?>
<a class="home" href="/PHP_Rush_MVC/">HOME</a>

	<nav>
		<ul><div class="Sett">Account settings</div>
			<li><a href="/PHP_Rush_MVC/user/Edit_me">Edit me !</a></li>
			<li><a href="/PHP_Rush_MVC/user/Delete_me">Delete me !</a></li>
			<li><a href="/PHP_Rush_MVC/login/logout">Logout !</a></li>
		</ul>
	</nav>
