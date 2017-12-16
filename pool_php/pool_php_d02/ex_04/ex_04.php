<?php
function my_password_hash($str)
{
    $passwrd= array();
    $passwrd["salt"]=rand();
    $passwrd["hash"] = md5($str.$passwrd["salt"]);
    return($passwrd);
}

function my_password_verify($str, $salt, $hash)
{
    $try_hash = md5($str.$salt);
    $result = ($try_hash == $hash) ? TRUE : FALSE;
    return($result);
}


/* $crypted = (my_password_hash($argv[1])); */
/* print_r($crypted); */
/* echo my_password_verify($argv[1], $crypted["salt"],$crypted["hash"]),"\n"; */
?>