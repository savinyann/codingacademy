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
			pokemon = pokemon.toLowerCase()
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
					let pokemon_pre =
					{
						id : JSON.parse(pokemon['_body'])['order'],
						types : JSON.parse(pokemon['_body'])['types'],
						name : JSON.parse(pokemon['_body'])['name'],
					}
					self.pokemon_catched = pokemon_pre
					self.error = null
				}
				self.loading = false
			})
		}
	}
}