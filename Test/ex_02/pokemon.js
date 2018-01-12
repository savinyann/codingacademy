$(document).ready(function()
{
	pokemonUrl = 'https://pokeapi.co/api/v2/pokemon/'
	$('#getPokemon').click(() => getPokemon())

	function getPokemon()
	{
		pokemon = $('#pokemon').val()
		if(pokemon != "")
		{
			$.get(pokemonUrl+pokemon+"/", function(data,status)
			{

				$('#display').show()
				$('#id').text('id : ' + data['id'])
				$('#name').text('name : ' + data['name'])

				displayTypes = ""
				firstType = true
				data['types'].forEach(function(type)
				{
					if(firstType == false)
					{
						displayTypes += ', '
					}
					else
					{
						firstType = false
					}
					displayTypes+= type['type']['name']
				})
				$('#type').text('types : ' + displayTypes)
			})
		}
	}

});