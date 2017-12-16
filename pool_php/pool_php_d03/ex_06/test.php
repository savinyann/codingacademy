<?php
include("Gecko.php");

$alx = new Gecko("Alex");
$alx->setEnergy(32);
echo $alx->getEnergy()."\n";
$alx->setEnergy(-4);
echo $alx->getEnergy()."\n";
$alx->setEnergy(96);
echo $alx->getEnergy()."\n";
$alx->eat("mEat");
echo $alx->getEnergy()."\n";
$alx->setEnergy(06);
echo $alx->getEnergy()."\n";
$alx->eat("vEgetable");
echo $alx->getEnergy()."\n";

?>