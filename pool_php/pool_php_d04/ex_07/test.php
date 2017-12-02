<?php
include_once "Phobos.php";
include_once "Astronaut.php";
include_once "Mars.php";
include_once "Team.php";

$chocolate0 = new chocolate\Mars("Buzz");
$chocolate1 = new chocolate\Mars("Flash");
$chocolate2 = new chocolate\Mars("Flash");

$planet0 = new planet\Mars("23 000 km");
$planet1 = new planet\Mars("15 000 km");
$planet2 = new planet\Mars("15 000 km");

$moon0 = new planet\moon\Phobos($planet0);
$moon1 = new planet\moon\Phobos($planet1);
$moon2 = new planet\moon\Phobos($planet2);

$buzz = new Astronaut("Buzz");
$aldrin = new Astronaut("Aldrin");
$houston = new Astronaut("Houston");

$blopy_team = new Team("Blopy Team 7");
$blopy_team->getName();
$blopy_team->add($aldrin);
$blopy_team->add($buzz);
$blopy_team->add($chocolate1);
$buzz->doActions($planet0);
echo "--------------    SHOW MEMBERS    -------------\n";
$blopy_team->showMembers();
echo "---------------   GET ASTRONAUT   -------------\n";
print_r($blopy_team->getAstronauts());
echo "----------------   COUNTMEMBERS   -------------\n";
echo $blopy_team->getName()." est composé de ".$blopy_team->countMembers()." membre(s) d'équipage.\n";
$blopy_team->doActions("Nothing");
$blopy_team->doActions($moon2);
$blopy_team->doActions($planet0);
$blopy_team->doActions($chocolate1);
echo "--------------------   END   ------------------\n";
?>