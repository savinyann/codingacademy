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

$buzz = new Astronaut("Buzz");
$aldrin = new Astronaut("Aldrin");
$houston = new Astronaut("Houston");
$woodie = new Astronaut("Woodie");
$anakin = new Astronaut("Anakin");

$blopy_team = new Team("Blopy Team 7");
$blopy_team->getName();
$blopy_team->add($anakin);
$blopy_team->add($anakin);
$blopy_team->add($chocolate1);
$buzz->doActions($planet0);
echo "--------------    SHOW Astronauts    ----------\n";
print_r($blopy_team->getAstronauts());
echo "---------------  SHOWMEMBERS  -----------------\n";
echo $blopy_team->countMembers()."\n";
$blopy_team->showMembers();
$blopy_team->remove($anakin);
$blopy_team->remove($buzz);
$blopy_team->remove($aldrin);
$blopy_team->remove($woodie);
echo "-----  DELETED MEMBERS - SHOW Astronaut   -----\n";
print_r($blopy_team->getAstronauts());
echo "----------------   COUNTMEMBERS   -------------\n";
echo $blopy_team->getName()." est composé de ".$blopy_team->countMembers()." membre(s) d'équipage.\n";
echo "---------------  SHOWMEMBERS  -----------------\n";
$blopy_team->showMembers();
echo "--------------------   END   ------------------\n";
?>