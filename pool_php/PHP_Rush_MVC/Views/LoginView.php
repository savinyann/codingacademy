
<div class="divMain">
<?php

echo($this->getForm());

?>

<form action="../../PHP_Rush_MVC/inscription/index"><button>Create new account</button></form>

<p class="message"><?php
if(isset($_SESSION["new_user"]))
{
	echo $_SESSION["new_user"];
	unset($_SESSION["new_user"]);
}
if(null !== $this->getMessage())
{
	foreach ($this->getMessage() as $key => $value)
	{
		echo $value."<br>";
	}
}
?></p>
</div>