(function($){
$.fn.game_2048 = function()
{
	$("body").load("html/2048-min.html", function()
	{
	var backGroundMusic = new Audio("media/music/1.mp3");
	backGroundMusic.loop = true;
	backGroundMusic.volume = Number($("#music_volume").val())/100;
	backGroundMusic.play();	
	$("#animation_speed_number").text((Math.floor($("#animation_speed").val()/25)*25).toString()+" ms");
	$("#music_volume_number").text((Math.floor($("#music_volume").val()/5)*5).toString()+" %");
	$("#effect_volume_number").text((Math.floor($("#effect_volume").val()/5)*5).toString()+" %");
	var sound_effect = Number($("#effect_volume").val())/100;
	import_highscore();
	import_music_list();
	import_class_list();
	var effect = true;
	var music = true;
	var animation = true;
	var speed = Number($("#animation_speed").val());
	var biggestTile = 0;
	var previous_play = null;
	var score = 0;
	var count = 0;
	var timer = Date.now();
	var merging = [];
	var one_tile_moved = false;
	var one_tile_merged = false;
	game_start();

	$("#arrowLeft").click(function()
	{
		$(".echo").remove();
		merging = [];
		timer = Date.now() + speed;
		one_tile_moved = false;
		one_tile_merged = false;
		toTheLeft();
	});

	$("#arrowRight").click(function()
	{
		$(".echo").remove();
		merging = [];
		timer = Date.now() + speed;
		one_tile_moved = false;
		one_tile_merged = false;
		toTheRight();
	});
	
	$("#arrowTop").click(function()
	{
		$(".echo").remove();
		merging = [];
		timer = Date.now() + speed;
		one_tile_moved = false;
		one_tile_merged = false;
		toTheTop();
	});
	
	$("#arrowBot").click(function()
	{
		$(".echo").remove();
		merging = [];
		timer = Date.now() + speed;
		one_tile_moved = false;
		one_tile_merged = false;
		toTheBot();
	});

	$("#bgm").change(function()
	{
		backGroundMusic.pause();
		backGroundMusic = new Audio("media/music/"+$(this).val()+".mp3");
		backGroundMusic.volume = (music) ? Number($("#music_volume").val())/100 : 0;
		backGroundMusic.loop = true;
		backGroundMusic.play();
	});

	$("#main_bg").change(function()
	{
		$("main").css("background-image","url(media/pict/main/"+$(this).val()+".png)");
	});

	$("#music_volume").change(function()
	{
		$("#music_volume_number").text((Math.floor($(this).val()/5)*5).toString()+" %");
		backGroundMusic.volume = (music) ? Number($(this).val())/100 : 0;
	});

	$("#music_activated").change(function()
	{
		music = (music) ? false : true;
		backGroundMusic.volume = (music) ? Number($("#music_volume").val())/100 : 0;
	});

	$("#effect_volume").change(function()
	{
		$("#effect_volume_number").text((Math.floor($(this).val()/5)*5).toString()+" %");
		sound_effect = (effect) ? Number($(this).val())/100 : 0;
	});

	$("#effect_activated").change(function()
	{
		effect = (effect) ? false : true;
		sound_effect = (effect) ? Number($("effect_volume").val())/100 : 0;
	});

	$("#animation_speed").change(function()
	{
		$("#animation_speed_number").text((Math.floor($(this).val()/25)*25).toString()+" ms");
		speed = (animation) ? Number($(this).val()) : 0;
	});

	$("#animation_activated").change(function()
	{
		animation = (animation) ? false : true;
		speed = (animation) ? Number($("#animation_speed").val()) : 0;
	});

	$("#reset").click(function()
	{
		setcookie(0);
		game_start();
	});

	$("#export").click(function()
	{
		backGroundMusic.volume = (music) ? Number($("#music_volume").val())/100 : 0;
		export_highscore();
		game_start();
		import_highscore();
	});


	$("#settings").click(function()
	{
		$(".game").hide();
		$(".settings").show();
	});


	$("#back").click(function()
	{
		$(".game").show();
		$(".settings").hide();
	});


	$("*").on("keyup",function(event)
		{
			if(Date.now() > (timer+50))
			{
				$(".echo").remove();
				merging = [];
				play(event);
				timer = Date.now() + speed;
			}
		});


	function game_saved(play_field)
	{
		if(play_field != undefined)
		{
			$("main div div").addClass("baby");
			for(var i = 0; i<= 15; i++)
			{
				$("#"+i.toString()).text(play_field[i]);
			}
			for (var i = 0; i <= 15; i++)
			{
				tileMaxValue(Number($("#"+i.toString()).text()));
				setTimeout(function()
				{
					$("main div div").removeClass("baby");
				},50);
			}
			setTimeout(tileBackGround,0);
		}
	}


	function game_start()
	{
		$("#game_over").hide();
		cookie = getCookie("2048_state=");
		score = 0;
		biggestTile = 0;
		if(cookie == null)
		{
			$("main div div").text("");
			$("main div div").css("background-image","none");
			tile_generator();
			tile_generator();
		}
		else
		{
			var play_field = cookie.split(",");
			game_saved(play_field);
			score = Number(play_field[16]);
			biggestTile 
		}
		update_score();
		$("#bigger_tile").css("background-image", "url(media/pict/tile/"+(biggestTile*2).toString()+".png)");
	}


	function play(key_striked)
	{

		one_tile_moved = false;
		one_tile_merged = false;
    	var arrow = key_striked.which || key_striked.keyCode;
    	if(arrow == 37)
    	{
    		toTheLeft();
    	}
    	if(arrow == 38)
    	{
    		toTheTop();
    	}
    	if(arrow == 39)
    	{
    		toTheRight();
    	}
    	if(arrow == 40)
    	{
    		toTheBot();
    	}
	}

	function tile_generator()
	{
		var tile_position = Math.floor(Math.random() * 16);
		var tile_number = (Math.random() < 0.9) ? "2" : "4";
		if($("#"+tile_position).text() == "")
		{
			update_score();
			$("#bigger_tile").css("background-image", "url(media/pict/tile/"+(biggestTile*2).toString()+".png)");
			$("#"+tile_position).text(tile_number);
			if(animation)
			{
				$("#"+tile_position).addClass("baby");
				setTimeout(function()
				{
					$("#"+tile_position).removeClass("baby");
					$("#"+tile_position).css("background-image","url(media/pict/tile/"+$("#"+tile_position).text()+".png)");
				},50);
			}
			else
			{
				$("#"+tile_position).css("background-image","url(media/pict/tile/"+$("#"+tile_position).text()+".png)");				
			}
			setcookie(86400000);
			setTimeout(whining_condition,speed);
		}
		else
		{
			tile_generator();
		}
	}


	function update_score()
	{
		$("#score").text(score.toString());
		$("#score").css("left","calc(50%-"+$("#score").width()+"px");
	}


	function toTheLeft()
	{
		var already_merged = [0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0];
		var play_field = check_move();
		for (var j = 0; j <= 3; j++)
		{
			for (var i = 4*j+1; i <= 4*j+3; i++)
			{
				var id_start = i;
				var id_end = i;
				var value_start = $("#"+i.toString()).text();
				var value_end = $("#"+i.toString()).text();
				while($("#"+i.toString()).text() != "" && $("#"+(i-1).toString()).text() == "" && i%4!=0)
				{
					$("#"+(i-1).toString()).text($("#"+i.toString()).text());
					$("#"+i.toString()).text("");
					i += -1;
					id_end = i;
					value_end = $("#"+i.toString()).text();
				}
				if($("#"+i.toString()).text() == $("#"+(i-1).toString()).text() && $("#"+i.toString()).text() != "" && already_merged[i-1] == 0 && i%4 != 0)
				{
					score += Number($("#"+i.toString()).text())*2;
					$("#"+(i-1).toString()).text(Number($("#"+i.toString()).text())*2);
					$("#"+i.toString()).text("");
					already_merged[i-1] = 1;
					id_end = i-1;
					value_end = $("#"+(i-1).toString()).text();
				}
				moving_animation(id_start, id_end, value_start, value_end);
			}
		}
		check_move(play_field);
		return(true);
	}


	function toTheRight()
	{
		var already_merged = [0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0];
		var play_field = check_move();
		for (var j = 3; j >= 0; j--)
		{
			for (var i = 4*j+2; i >= 4*j; i+= -1)
			{
				var id_start = i;
				var id_end = i;
				var value_start = $("#"+i.toString()).text();
				var value_end = $("#"+i.toString()).text();
				while($("#"+i.toString()).text() != "" && $("#"+(i+1).toString()).text() == "" && i%4 != 3)
				{
					$("#"+(i+1).toString()).text($("#"+i.toString()).text());
					$("#"+i.toString()).text("");
					i += 1;
					id_end = i;
					value_end = $("#"+i.toString()).text();
				}
				if($("#"+i.toString()).text() == $("#"+(i+1).toString()).text() && $("#"+i.toString()).text() != "" && already_merged[i+1] == 0 && i%4!=3)
				{
					score += Number($("#"+i.toString()).text())*2;
					$("#"+(i+1).toString()).text(Number($("#"+i.toString()).text())*2);
					$("#"+i.toString()).text("");
					already_merged[i+1] = 1;
					id_end = i+1;
					value_end = $("#"+(i+1).toString()).text();
				}
				moving_animation(id_start, id_end, value_start, value_end);
			}
		}
		check_move(play_field);
		return(true);
	}


	function toTheTop()
	{
		var already_merged = [0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0];
		var play_field = check_move();
		for (var j = 0; j <= 3; j++)
		{
			for (var i = j+4; i <= j+12; i+=4)
			{
				var id_start = i;
				var id_end = i;
				var value_start = $("#"+i.toString()).text();
				var value_end = $("#"+i.toString()).text();
				while($("#"+i.toString()).text() != "" && $("#"+(i-4).toString()).text() == "" && i > 3)
				{
					$("#"+(i-4).toString()).text($("#"+i.toString()).text());
					$("#"+i.toString()).text("");
					i += -4;
					id_end = i;
					value_end = $("#"+i.toString()).text();
				}
				if($("#"+i.toString()).text() == $("#"+(i-4).toString()).text() && $("#"+i.toString()).text() != "" && already_merged[i-4] == 0)
				{
					score += Number($("#"+i.toString()).text())*2;
					$("#"+(i-4).toString()).text(Number($("#"+i.toString()).text())*2);
					$("#"+i.toString()).text("");
					already_merged[i-4] = 1;
					id_end = i-4;
					value_end = $("#"+(i-4).toString()).text();
				}
				moving_animation(id_start, id_end, value_start, value_end);
			}
		}
		check_move(play_field);
		return(true);
	}


	function toTheBot()
	{
		var already_merged = [0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0];
		var play_field = check_move();
		for (var j = 3; j >= 0; j--)
		{
			for (var i = j+8; i >= j; i-=4)
			{
				var id_start = i;
				var id_end = i;
				var value_start = $("#"+i.toString()).text();
				var value_end = $("#"+i.toString()).text();
				while($("#"+i.toString()).text() != "" && $("#"+(i+4).toString()).text() == "" && i < 12)
				{
					$("#"+(i+4).toString()).text($("#"+i.toString()).text());
					$("#"+i.toString()).text("");
					i += 4;
					id_end = i;
					value_end = $("#"+i.toString()).text();
				}
				if($("#"+i.toString()).text() == $("#"+(i+4).toString()).text() && $("#"+i.toString()).text() != "" && already_merged[i+4] == 0)
				{
					score += Number($("#"+i.toString()).text())*2;
					$("#"+(i+4).toString()).text(Number($("#"+i.toString()).text())*2);
					$("#"+i.toString()).text("");
					already_merged[i+4] = 1;
					id_end = i+4;
					value_end = $("#"+(i+4).toString()).text();
				}
				moving_animation(id_start, id_end, value_start, value_end);
			}
		}
		check_move(play_field);
		return(true);
	}


	function moving_animation(start, end, start_value, end_value)
	{
		if(start != end)
		{
			var y_start = start%4;
			var x_start = (start-y_start)/4;
			var x_end = end%4;
			var y_end = (end-x_end)/4;
			x_start *= 150;
			y_start *= 150;
			x_end *= 150;
			y_end *= 150;
			
			tileClearBackGround(start);
			if(animation)
			{
				
				if(one_tile_moved == false && speed >= 2000)
				{
					var hit = new Audio("media/sound/hit"+Math.floor(Math.random()*8+1).toString()+".mp3");
					hit.volume = sound_effect;
					hit.play();

					one_tile_moved = true;
				}
				$("#field").append("<div class='echo' style='left:"+y_start.toString()+"px;top:"+x_start.toString()+"px'></div>");
				$("#field .echo:last-child").css("background-image","url(media/pict/tile/"+start_value.toString()+".png)");

				$("#field .echo:last-child").animate({top: y_end.toString()+'px', left: x_end.toString()+'px'},{duration:speed, queue: false})
			}
		}

		if(start_value != end_value)
		{
			merging.push(end,end_value);		
		}
	}



	function merging_animation()
	{
		if(animation)
		{
			for (var i = 0; i <= merging.length-1; i+=2)
			{
				if(one_tile_merged == false && speed >= 2000)
				{
					var merge = new Audio("media/sound/merge"+Math.floor(Math.random()*7+1).toString()+".mp3");
					merge.volume = sound_effect;
					merge.play();
					one_tile_merged = true;
				}
				var y = merging[i]%4;
				var x = (merging[i]-y)/4;
				y *= 150;
				x *= 150;
				$("#field").append("<div class='echo' style='display:none;left:"+y.toString()+"px;top:"+x.toString()+"px'></div>");
				$("#field .echo:last-child").css("background-image","url(media/pict/tile/"+merging[i+1].toString()+".png)");
				$("#field .echo:last-child").fadeIn(speed);
				tileMaxValue(merging[i+1]);
			}
		}
	}


	function tileClearBackGround(id)
	{
		$("#"+id.toString()).css("background-image","none");
	}


	function tileBackGround()
	{
		for (var i = 0; i <= 15; i++)
		{
			if($("#"+i.toString()).text() != "")
			{
				$("#"+i.toString()).css("background-image","url(media/pict/tile/"+$("#"+i.toString()).text()+".png)");
			}
		}
	}



	function check_move(play_field)
	{
		if(play_field == undefined)
		{
			play_field = [];
			$("main div div:not(.echo)").each(function()
			{
				play_field.push($(this).text());
			});
			previous_play = play_field;
			return(play_field);
		}
		else
		{
			var played = false;
			for (var i = 0; i <= 15; i++)
			{
				if(play_field[i] != $("#"+i.toString()).text())
				{
					played = true;
				}
			}
			if(played == true)
			{
				setcookie(86400000);
				setTimeout(merging_animation,speed);
				setTimeout(tileBackGround,speed);
				setTimeout(tile_generator,speed);
			}
		}
	}


	function setcookie(time)
{
	var d = new Date();
	d.setTime(d.getTime() + time);
	var state = check_move();
	state.push(score);
	document.cookie = "2048_state="+state.toString()+";expires="+d.toUTCString();
}


function getCookie(cookie)
{
	all_Cookie = document.cookie;
	all_Cookie = all_Cookie.split(";");
	for(i= 0; i < all_Cookie.length; i++)
	{
		if(all_Cookie[i].search(cookie) != -1)
		{
			return(all_Cookie[i].substr(cookie.length));
		}
	}
	return(null);
}


	function tileMaxValue(value)
	{
		if(value != undefined && Number(value) > biggestTile)
		{
			biggestTile = Number(value);
		}
	}


	function whining_condition()
	{
		for (var i = 0; i <= 15; i++)
		{
			if($("#"+i.toString()).text() == "")
			{
				return(true);
			}
			if($("#"+i.toString()).text() == $("#"+(i-1).toString()).text() && i != 0 && i != 4 && i != 8 && i != 12)
			{
				return(true);
			}
			if($("#"+i.toString()).text() == $("#"+(i+1).toString()).text() && i != 3 && i != 7 && i != 11 && i != 15)
			{
				return(true);
			}
			if($("#"+i.toString()).text() == $("#"+(i-4).toString()).text())
			{
				return(true);
			}
			if($("#"+i.toString()).text() == $("#"+(i+4).toString()).text())
			{
				return(true);
			}
		}	
		setcookie(0);
		game_over();
	}


	function game_over()
	{
		$("#game_over").fadeIn(speed);
		backGroundMusic.volume = 0;
		if(biggestTile >= 2048)
		{
			$("#result").attr("src","media/pict/gameover/victory.png");
 			var end_music = new Audio("media/sound/win"+Math.floor(Math.random()*3+1).toString()+".mp3")
 			end_music.play();
 			end_music.onended = function()
 			{
				backGroundMusic.volume = (music) ? Number($("#music_volume").val())/100 : 0;
 			}	
		}
		else
		{
			$("#result").attr("src","media/pict/gameover/defeat.png");
 			var end_music = new Audio("media/sound/lose"+Math.floor(Math.random()*3+1).toString()+".mp3")
 			end_music.play();
 			end_music.onended = function()
 			{
 				backGroundMusic.volume = (music) ? Number($("#music_volume").val())/100 : 0;
 			}
		}
	}



	function import_highscore()
	{
        $.post("php/database_2048.php","import",function(data)
        {
        	var data_dec = JSON.parse(data);
        	$("tr:not(tr:first-child)").remove();
        	data_dec.forEach(function(element)
        	{
        		$("table").append("<tr><td>"+element["Name"]+"</td><td>"+element["Score"]+"</td><td>"+element["TileMaxValue"]+"</td></tr>");
        	});
        });
	}


	function export_highscore()
	{
		var Name = $("#player_name").val();
		data = {export: [Name, score, biggestTile]};
		$.post("php/database_2048.php",data);
	}


	function import_music_list()
	{
		$.post("php/database_2048.php", "music", function(data)
		{
			var data_dec = JSON.parse(data);
			data_dec.forEach(function(element)
			{
				$("select#bgm").append("<option class='settings' value="+element["id"]+">"+element["music_name"]+"</option>");
			});
		});
	}


	function import_class_list()
	{
		$.post("php/database_2048.php", "class", function(data)
		{
			var data_dec = JSON.parse(data);
			data_dec.forEach(function(element)
			{
				$("select#main_bg").append("<option class='settings' value="+element["id"]+">"+element["picture"]+"</option>");
			});
		});
	}
	});
}

})(jQuery);