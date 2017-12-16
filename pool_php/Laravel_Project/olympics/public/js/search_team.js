$(document).ready(function()
{
	$('div#accordion a h2').each(function()
	{
		console.log($(this).text());
	});



	$("#search").keyup(function()
    {
        var count = 0;
        var search = $(this).val().toLowerCase()
        $('div#accordion a h2').each(function()
        {
            var name = $(this);
            var match = false;
     
            if(name.text().toLowerCase().search(search) != -1 && search != "")
            {
                match = true;
            }

            if(match)
            {
                $(this).closest('article').addClass('accordion_find');
            }
            else
            {
                $(this).closest('article').removeClass('accordion_find');
            }
        })
    });
});