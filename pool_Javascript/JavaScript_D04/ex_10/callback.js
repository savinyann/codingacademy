$(document).ready(function()
{
    $("button").click(toggle_test)

function toggle_test()
{
	$(".test").toggle()
	alert("The paragraph is now hidden")
}
});