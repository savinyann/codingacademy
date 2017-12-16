<?php
include_once("Gecko.php");

$thomas = new Gecko("Thomas");
$anonymous = new Gecko();
$serguei = new Gecko("Serguei");
echo "--- unset sergei ---\n";
unset($serguei);
echo "--- unset anonymous ---\n";
unset($anonymous);
echo "--- getName thomas ---\n";
echo $thomas->getName()."\n";
?>