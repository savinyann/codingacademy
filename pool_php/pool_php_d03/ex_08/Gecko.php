<?php
class Gecko
{
    private $_name;
    private $_age;
    private $_energy;
    private $_dice = 0;


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
        if($this->throw_dice())
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
    }


    public function eat($str)
    {
        if($this->throw_dice())
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


    public function work()
    {
        if($this->throw_dice())
        {
            if($this->_energy >= 25)
            {
                echo "I'm working T.T\n";
                $this->setEnergy($this->_energy - 9);
            }
            else
            {
                echo "Heyyy... I'm too sleepy, better take a nap!\n";
                $this->_dice = 0;
                $this->setEnergy($this->_energy + 50);
            }
        }
    }


    public function fraternize($friend)
    {
        if($this->throw_dice())
        {
            switch($friend)
            {
                case (gettype($friend) == "object" && get_class($friend) == "Gecko"):
                    $this->fraternize_with_Gecko($this, $friend);
                    break;

                case ($friend == "Snake" || (gettype($friend) == "object" && get_class($friend) == "Snake")):
                    $this->run_from_snake();
                    break;

                default:
                    echo "No way.\n";
                    break;
            }
        }
    }


    private function fraternize_with_Gecko($gecko1, $gecko2)
    {
        if($gecko1->getEnergy() >= 30 && $gecko2->getEnergy() >= 30)
        {
            $gecko1->drink_with_gecko($gecko2);
            $gecko2->drink_with_gecko($gecko1);
        }
        else if ($gecko1->getEnergy() < 30 && $gecko2->getEnergy() < 30)
        {
            $gecko1->not_today();
            $gecko2->not_today();
        }
        else if($gecko1->getEnergy() < 30 || $gecko2->getEnergy() >= 30)
        {
            $gecko1->too_exhausted($gecko2);
        }
        else
        {
            $gecko2->too_exhausted($gecko1);
        }
    }


    public function drink_with_gecko($gecko)
    {
        echo "I'm going to dring with $gecko->_name !\n";
        $this->setEnergy($this->getEnergy() - 30);
        $this->_dice = 1;
    }


    public function not_today()
    {
        echo "Not today !\n";
    }


    public function too_exhausted($gecko)
    {
        echo "Sorry $gecko->_name, I'm too tired for going out tonight...\n";
        $gecko->not_exhausted();
    }


    public function not_exhausted()
    {
        echo "Oh ! That's too bad, another time then !\n";
    }


    private function run_from_snake()
    {
        {
            if($this->getEnergy() >= 10)
            {
                $this->setEnergy(0);
                echo "LET'S RUN AWAY !!!\n";
            }
            else
            {
                echo "...\n";
            }
        }
    }


    private function throw_dice()
    {
        if ($this->_dice == 1 && (rand(0, 5) == 0))
        {
            echo "I'm too drunk for that... hic !\n";
            return(FALSE);
        }
        else
        {
            return(TRUE);
        }
    }
}
?>