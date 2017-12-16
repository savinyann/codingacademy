$(document).ready(function()
{
	$('table.yann_subtable_maxsize:first-child tr:first-child th:first-child + td').each(function()
	{
		console.log($(this).text());
	});



	$("#search").keyup(function()
    {
        var count = 0;
        var search = $(this).val().toLowerCase()
        $('table.yann_subtable_maxsize:first-child tr:first-child th:first-child + td').each(function()
        {
            var name = $(this);
            var match = false;
     
            if(name.text().toLowerCase().search(search) != -1)
            {
                match = true;
            }

            if(match)
            {
                $(this).closest('a').show();
            }
            else
            {
                $(this).closest('a').hide();
            }
        })
    });
});