$(document).ready(function()
{
	pokemonUrl = 'https://pokeapi.co/api/v2/pokemon/1/'
	$('#getPokemon').click(() => getPokemon())

	function getPokemon()
	{
		pokemon = $('#pokemon').val()
		if(pokemon != "")
		{
			$.get(pokemonUrl, function(data,status)
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