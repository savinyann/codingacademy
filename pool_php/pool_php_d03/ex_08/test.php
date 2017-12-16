<?php
include("Gecko.php");

$alx = new Gecko("Alex");
$raph = new Gecko("Raph");
$alx->setEnergy(30);
$raph->setEnergy(29);
$alx->fraternize("Snake");;
?>