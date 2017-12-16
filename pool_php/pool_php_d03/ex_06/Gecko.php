<?php
class Gecko
{
    private $_name;
    private $_age;
    private $_energy;
    
    public function __construct($name = NULL, $age = NULL)
    {
        $this->_name = $name;
        $this->_age = $age;
        $this->_energy = 100;
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

    public function getEnergy()
    {
        return ($this->_energy);
    }

    public function setEnergy($energy)
    {
        $this->_energy = ($energy > 0 && $energy < 100) ? $energy : (($energy < 0) ? 0 : 100);
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

    public function hello($param = NULL)
    {
        switch(gettype($param))
        {
            case "string":
                $hello = "Hello $param";
                $hello .= ($this->_name) ? ", I'm $this->_name" : "";
                echo $hello."!\n";
                break;

            case "integer":
                $hello = ($this->_name) ? "Hello, I'm $this->_name" : "Hello ";
                for($i=0; $i < $param; $i++)
                {
                    echo $hello."!\n";
                }
                break;

            default:
                return(NULL);
                break;
        }
    }

    public function eat($str)
    {
        $str = strtolower($str);
        switch($str)
        {
            case "meat":
                $this->setEnergy($this->_energy + 10);
                echo "Yummy!\n";
                break;

            case "vegetable":
                $this->setEnergy($this->_energy - 10);
                echo "Erk!\n";
                break;

            default:
                echo "I can't eat this.\n";
                break;
        }

    }
}
?>