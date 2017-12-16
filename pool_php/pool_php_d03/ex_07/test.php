<?php
include("Gecko.php");

$alx = new Gecko("Alex");
for($i=0; $i < 20; $i++)
{
	echo $alx->getEnergy()." - ";
	$alx->work();
}
?>