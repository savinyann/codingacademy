<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tournament extends Model
{
	protected $table = 'tournament'

	public function fixtures()
	{
		return $this->hasMany('App\Fixture')
	}
}