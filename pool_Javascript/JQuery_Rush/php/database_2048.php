<?php
include_once "class_query.php";

if(isset($_POST["import"]))
{
	import_highscore();
}

if(isset($_POST["export"]))
{
	export_highscore($_POST["export"]);
}
if(isset($_POST["music"]))
{
	import_music_list();
}
if(isset($_POST["class"]))
{
	import_class_list();
}



function import_highscore()
{
	$query = "SELECT Name, Score, TileMaxValue FROM Highscore ORDER BY Score desc LIMIT 8";
	$SQL = new Query($query);
	$highscore = $SQL->SQLquery();
	$highscore_encoded = json_encode($highscore);
	echo $highscore_encoded;
}


function export_highscore($highscore)
{
	$query = "INSERT INTO Highscore (Name, Score, TileMaxValue) VALUES (?,?,?)";
	$SQL = new Query($query, $highscore);
	$SQL->SQLquery();
}


function import_music_list()
{
	$query = "SELECT * FROM music";
	$SQL = new Query($query);
	$music = $SQL->SQLquery();
	$music_encoded = json_encode($music);
	echo $music_encoded;
}


function import_class_list()
{
	$query = "SELECT * FROM main";
	$SQL = new Query($query);
	$main = $SQL->SQLquery();
	$main_encoded = json_encode($main);
	echo $main_encoded;
}


?>