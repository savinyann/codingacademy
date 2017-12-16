<?php
include_once 'db_pdo.php';

$gecko = connect_db("choucroutte", "bla", "nenuphar", 213, 50);

//$attributes = array("AUTOCOMMIT", "ERRMODE", "CASE", "CLIENT_VERSION", "CONNECTION_STATUS", "ORACLE_NULLS", "PERSISTENT", "PREFETCH", "SERVER_INFO", "SERVER_VERSION", "TIMEOUT");

/*foreach ($attributes as $val)
{
	echo "PDO::ATTR_$val: ";
	echo $gecko->getAttribute(constant("PDO::ATTR_$val"))."\n";
}*/

?>