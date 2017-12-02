<?php
class Gecko
{
    private $_name;
    function __construct($name = NULL)
    {
        $this->_name = $name;
        $hello = ($name)? "Hello $name !" : "Hello !";
        echo "$hello\n";
    }

    function __destruct()
    {
        $bye = ($this->_name)? "Bye $this->_name !" : "Bye !";
        echo "$bye\n";
    }

    function getName()
    {
        if($this->_name)
            return($this->_name);
    }
}
?>