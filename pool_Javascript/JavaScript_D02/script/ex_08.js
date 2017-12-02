var canva = document.getElementsByTagName("canvas");
var parent = document.getElementsByTagName("div")[2];
var key = Object.keys(canva);
/*
alert(key);
*/

var black_color = 0;
var orange_color = 0;
var green_color = 0;
var purple_color = 0;
bgColor = [];

key.forEach(function(element)
{
	bgColor[element] = document.defaultView.getComputedStyle(canva[element],null)["backgroundColor"]
});


bgColor.forEach(function(element)
{
	if(element == "rgb(0, 0, 0)")
	{
		black_color++;
	}
	else if(element == "rgb(255, 165, 0)")
	{
		orange_color++;
	}
	else if(element == "rgb(128, 128, 0)")
	{
		green_color++;
	}
	else if(element == "rgb(128, 0, 128)")
	{
		purple_color++;
	}
});

key.forEach(function(element)
{
	if(orange_color > 0)
	{
		var ctx = canva[element].getContext("2d");
		ctx.fillStyle = "rgb(255, 165, 0)";
		ctx.fillRect(0, 0, canva[element].width, canva[element].height);
		orange_color--;
	}
	else if(purple_color > 0)
	{
		var ctx = canva[element].getContext("2d");
		ctx.fillStyle = "rgb(128, 0, 128)";
		ctx.fillRect(0, 0, canva[element].width, canva[element].height);
		purple_color--;	
	}
	else if(black_color > 0)
	{
		var ctx = canva[element].getContext("2d");
		ctx.fillStyle = "rgb(0, 0, 0)";
		ctx.fillRect(0, 0, canva[element].width, canva[element].height);
		black_color--;	
	}
	else if(green_color > 0)
	{
		var ctx = canva[element].getContext("2d");
		ctx.fillStyle = "rgb(128, 128, 0)";
		ctx.fillRect(0, 0, canva[element].width, canva[element].height);
		green_color--;	
	}
});