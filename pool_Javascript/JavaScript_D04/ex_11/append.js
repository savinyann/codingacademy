$(document).ready(function()
{
    $("button").click(append_list)

	function append_list()
	{
		var new_item = $('#listItem').val()
		var add_item = $("<div>"+new_item+"</div>")
		$("body").append(add_item)
	}
});