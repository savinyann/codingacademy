$(document).ready(function()
{
	var div = $("div")
	var player= 2;
	var ia = 0;

	$("#vs_ia").click(function()
	{
		if(ia == 0)
		{
			ia = 1
			console.log("playing vs ia")
		}
		else
		{
			ia = 0
			console.log("player 1 vs player 2")
		}
		$("div").css("background-color", "transparent")
		player = 2
	})

	$("#reset").click(function()
	{
		$("div").css("background-color", "transparent")
		$("div").css("background-image", "none")
		player = 2
	})

	$("main div div").click(function()
	{
		if(player == 2 && $(this).css("background-color") == "transparent")
		{
			$(this).css("background-color", "red")
			$(this).css("background-image", "url(cross.jpg)")
			$(this).css("background-size", "cover")
			$(this).css("background-repeat", "no-repeat")
			player = 1
			if(ia == 1 && win() == false)
			{
				setTimeout(ia_play,2000)
				player = 2
			}
		}
		else if(player == 1 && $(this).css("background-color") == "transparent")
		{
			$(this).css("background-color", "green")
			$(this).css("background-image", "url(circle.jpg)")
			$(this).css("background-size", "cover")
			$(this).css("background-repeat", "no-repeat")
			player = 2
		}
		win()
	})


	function ia_play()
	{
		var rand = Math.random()*1000000000000000000%9
		if($("div:nth-child("+rand+")").css("background-color") == "transparent")
		{
			$("div:nth-child("+rand+")").css("background-color","green")
			$("div:nth-child("+rand+")").css("background-image", "url(circle.jpg)")
			$("div:nth-child("+rand+")").css("background-size", "cover")
			$("div:nth-child("+rand+")").css("background-repeat", "no-repeat")
		}
		else
		{
			ia_play()
		}
	}


function win()
{
	if($("div:nth-child(1)").css("background-color") == $("div:nth-child(2)").css("background-color") && $("div:nth-child(1)").css("background-color") == $("div:nth-child(3)").css("background-color") && $("div:nth-child(1)").css("background-color") != "transparent")
	{
		alert("player "+player+" wins")
		$("div").css("background-color", "transparent")
		$("div").css("background-image", "none")
		player = 2
		return(true)
	}
	else if($("div:nth-child(4)").css("background-color") == $("div:nth-child(5)").css("background-color") && $("div:nth-child(4)").css("background-color") == $("div:nth-child(6)").css("background-color") && $("div:nth-child(4)").css("background-color") != "transparent")
	{
		alert("player "+player+" wins")
		$("div").css("background-color", "transparent")
		$("div").css("background-image", "none")
		player = 2
		return(true)
	}
	else if($("div:nth-child(7)").css("background-color") == $("div:nth-child(8)").css("background-color") && $("div:nth-child(7)").css("background-color") == $("div:nth-child(9)").css("background-color") && $("div:nth-child(7)").css("background-color") != "transparent")
	{
		alert("player "+player+" wins")
		$("div").css("background-color", "transparent")
		$("div").css("background-image", "none")
		player = 2
		return(true)
	}
	else if($("div:nth-child(1)").css("background-color") == $("div:nth-child(4)").css("background-color") && $("div:nth-child(1)").css("background-color") == $("div:nth-child(7)").css("background-color") && $("div:nth-child(1)").css("background-color") != "transparent")
	{
		alert("player "+player+" wins")
		$("div").css("background-color", "transparent")
		$("div").css("background-image", "none")
		player = 2
		return(true)
	}
	else if($("div:nth-child(2)").css("background-color") == $("div:nth-child(5)").css("background-color") && $("div:nth-child(2)").css("background-color") == $("div:nth-child(8)").css("background-color") && $("div:nth-child(2)").css("background-color") != "transparent")
	{
		alert("player "+player+" wins")
		$("div").css("background-color", "transparent")
		$("div").css("background-image", "none")
		player = 2
		return(true)
	}
	else if($("div:nth-child(3)").css("background-color") == $("div:nth-child(6)").css("background-color") && $("div:nth-child(3)").css("background-color") == $("div:nth-child(9)").css("background-color") && $("div:nth-child(3)").css("background-color") != "transparent")
	{
		alert("player "+player+" wins")
		$("div").css("background-color", "transparent")
		$("div").css("background-image", "none")
		player = 2
		return(true)
	}
	else if($("div:nth-child(1)").css("background-color") == $("div:nth-child(5)").css("background-color") && $("div:nth-child(1)").css("background-color") == $("div:nth-child(9)").css("background-color") && $("div:nth-child(1)").css("background-color") != "transparent")
	{
		alert("player "+player+" wins")
		$("div").css("background-color", "transparent")
		$("div").css("background-image", "none")
		player = 2
		return(true)
	}
	else if($("div:nth-child(3)").css("background-color") == $("div:nth-child(5)").css("background-color") && $("div:nth-child(3)").css("background-color") == $("div:nth-child(7)").css("background-color") && $("div:nth-child(3)").css("background-color") != "transparent")
	{
		alert("player "+player+" wins")
		$("div").css("background-color", "transparent")
		$("div").css("background-image", "none")
		player = 2
		return(true)
	}
	else if($("div:nth-child(1)").css("background-color") != "transparent" && $("div:nth-child(2)").css("background-color") != "transparent" && $("div:nth-child(3)").css("background-color") != "transparent" && $("div:nth-child(4)").css("background-color") != "transparent" && $("div:nth-child(5)").css("background-color") != "transparent" && $("div:nth-child(6)").css("background-color") != "transparent" && $("div:nth-child(7)").css("background-color") != "transparent" && $("div:nth-child(8)").css("background-color") != "transparent" && $("div:nth-child(9)").css("background-color") != "transparent")
		{
			alert("Match nul")
			$("div").css("background-color", "transparent")
			$("div").css("background-image", "none")
			player = 2
			return(true)
		}
	return(false)
}
});