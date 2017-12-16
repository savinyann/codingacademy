<?php 
echo($this->getForm());
?>

<form action="../../PHP_Rush_MVC"><button>Cancel</button></form>

<p class="message"><?php
if(null !== $this->getMessage())
{
	foreach ($this->getMessage() as $key => $value)
	{
		echo $value."<br>";
	}
}


?></p>