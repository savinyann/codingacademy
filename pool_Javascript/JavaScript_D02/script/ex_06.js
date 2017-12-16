class Hero
{
	constructor(name, type, INT, STR)
	{
		this.name = name.substring(0,1).toUpperCase()+name.substring(1);
		this.type = type;
		this.INT = INT;
		this.STR = STR;
	}
	
	toString()
	{
		var name = "I am "+this.name;
		var type = " the "+this.type;

		var INT = ", I have "+this.INT+" intelligence point";
		if(this.INT > 1)
		{
			INT += "s";
		}
		var STR = " and "+this.STR+" strength point";
		if(this.STR > 1)
		{
			STR += "s";
		}
		return(name+type+INT+STR);
	}
}

var mage = new Hero("amadeus", "mage", 10, 3);
var warrior = new Hero("pontius", "warrior", 1, 8);
mage = mage.toString();
warrior = warrior.toString();

white_box = document.getElementsByTagName("div")[2];
white_box.innerHTML = mage+"<br>"+warrior;