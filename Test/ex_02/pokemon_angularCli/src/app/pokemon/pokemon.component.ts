import { Component, OnInit } from '@angular/core'
import { PokemonService } from '../pokemon.service'

@Component(
{
	selector: 'app-pokemon',
	templateUrl: './pokemon.component.html',
	styleUrls: ['./pokemon.component.css']
})
export class PokemonComponent implements OnInit
{
	pokemon_catched : any
	pokemon_keys : any
	error : any
	loading = false

	constructor(private pokemonService: PokemonService) { }

	ngOnInit()
	{
	}

	getPokemon(pokemon)
	{
		if(pokemon != "")
		{
			this.loading = true
			pokemon = pokemon.toLowerCase()+"/"
			var self = this
			this.pokemonService.getPokemon(pokemon).subscribe(function(pokemon)
			{
				if(pokemon['error'])
				{
					self.error = {error : "This pokemon doesn't exist."}
					self.pokemon_catched = null
				}
				else
				{
					pokemon = JSON.parse(pokemon['_body'])
					console.log(pokemon)
					let pokemon_pre =
					{
						id : pokemon['id'],
						types : self.getTypes(pokemon['types']),
						name : pokemon['name'],
					}
					self.pokemon_catched = pokemon_pre
					self.pokemon_keys = Object.keys(pokemon_pre)
					self.error = null
				}
				self.loading = false
			})
		}
	}

	getTypes(types)
	{
		let type = []
		types.forEach(function(field)
		{
			type.push(field['type']['name'])
		})
		return(type.join('/'))
	}
}