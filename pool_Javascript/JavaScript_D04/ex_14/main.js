$(document).ready(function()
{
   $("p").on("click",function()
   	{
   		$(this).toggleClass("highlighted")
   	});


   $("p").on("mouseover", function()
    {
        $(this).addClass("blue");
    });


	$("p").on("mouseout",function()
	{
		$(this).removeClass("blue");
	});

});