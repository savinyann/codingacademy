$(document).ready(function()
{
	var categories = []
	$("#catList").text().split("_").forEach(function(raw)
	{
		if(raw.length > 2)
		{
			categories.push(raw)
		}
	})

    $( "#appbundle_product_category" ).autocomplete(
	{
		source: categories,
   		messages:
   		{
        	noResults: '',
        	results: () => {},
    	}
	});
});