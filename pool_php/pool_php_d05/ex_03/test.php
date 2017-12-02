<?php
include_once 'Animal.php';


echo "\n -------------------------------\n";
$kitten = new Cat("Kitten", "black");
echo $kitten->getName()." is a ".$kitten->getColor()." cat, has ".$kitten->getLegs()." legs and is a ".$kitten->getType().".\n";

echo "\n -------------------------------\n";
$gryzouille = new Cat("Gryzouille");
echo $gryzouille->getName()." is a ".$gryzouille->getColor()." cat, has ".$gryzouille->getLegs()." legs and is a ".$gryzouille->getType().".\n";

echo "\n -------------------------------\n";
$kitten->meow();
$gryzouille->meow();
?>