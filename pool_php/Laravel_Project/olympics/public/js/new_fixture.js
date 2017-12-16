$(document).ready(function()
{
	var team1 = null;
	var team2 = null;

	$('#team2 :first-child').hide();
	$('#winner option').each(function()
	{
		$(this).hide();
	});

	$('#team1').change(function()
	{
		team1 = $('#team1 :selected').text();
		$('#team2 option').each(function()
		{
			if($(this).text() == team1)
			{
				$(this).hide();
			}
			else
			{
				$(this).show();
			}
		});
			
		$('#winner option').each(function()
		{
			if($(this).text() == team1 || $(this).text() == team2)
			{
				$(this).show();
			}
			else
			{
				$(this).hide();
			}
		});
	})

	$('#team2').change(function()
	{
		team2 = $('#team2 :selected').text();
		$('#team1 option').each(function()
		{
			if($(this).text() == team2)
			{
				$(this).hide();
			}
			else
			{
				$(this).show();
			}
		});
			
		$('#winner option').each(function()
		{
			if($(this).text() == team1 || $(this).text() == team2)
			{
				$(this).show();
			}
			else
			{
				$(this).hide();
			}
		});
	})
});