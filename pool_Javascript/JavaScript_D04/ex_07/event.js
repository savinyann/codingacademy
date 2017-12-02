$(document).ready(function()
{
    $("p").on("click", function()
    {
		$(this).remove()
    });


    $("p").on("mouseover", function()
    {
        $(this).css('background-color', 'lightgrey');
    });
    

    $("p").on("mouseout", function()
    {
        $(this).css('background-color', 'white');
    });
});