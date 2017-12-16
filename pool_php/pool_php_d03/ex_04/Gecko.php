<?php
class Gecko
{
    private $_name;
    private $_age;
    
    public function __construct($name = NULL, $age = NULL)
    {
        $this->_name = $name;
        $this->_age = $age;
        $hello = ($name)? "Hello $name !" : "Hello !";
        echo "$hello\n";
    }

    public function __destruct()
    {
        $bye = ($this->_name)? "Bye $this->_name !" : "Bye !";
        echo "$bye\n";
    }

    public function getName()
    {
        if($this->_name)
            return($this->_name);
    }

    public function getAge()
    {
        return($this->_age);
    }

    public function setAge($age)
    {
        $this->_age = $age;
    }

    public function status()
    {
        switch ($this->_age)
            {
            case 0:
                echo "Unborn Gecko\n";
                break;
                
            case ($this->_age == 1 || $this->_age == 2):
                echo "Baby Gecko\n";
                break;

            case ($this->_age <= 10 && $this->_age >= 3):
                echo "Adult Gecko\n";
                break;

            case ($this->_age <= 13 && $this->_age >= 11):
                echo "Old Gecko\n";
                break;

            default:
                echo "Impossible Gecko\n";
                break;
            }
    }
}
?>