<?php
class Gecko
{
    public $name;
    function __construct($name = NULL)
    {
        $this->name = $name;
        $hello = ($name)? "Hello $name !" : "Hello !";
        echo "$hello\n";
    }
}
?>