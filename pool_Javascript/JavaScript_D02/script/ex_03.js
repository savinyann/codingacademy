var white_block = document.getElementsByTagName("div")[2];


white_block.onclick = askname;


function askname()
{
	var name = prompt("What's your name ?");
	if(name == "" || name == null)
	{
		askname();
	}
	else
	{
		confirm_name(name);
	}
}


function confirm_name(name)
{
	if(!confirm("Are you sure that "+name+" is your name ?"))
	{
		askname();
	}
	else
	{
		alert("Hello "+name);
		white_block.textContent = "Hello "+name;
	}
}