$(document).ready(function()
{
    $("p:first").append("<input type='text' name='text'>")
    $("p:first").append("<ul></ul>")
    $("input:first").keyup(function()
    {
    	text = $(this).val()
    	if(text != null && text != "")
    	{
    		$("ul:first").append("<li>"+text+"</li>")
    	}
    })
});