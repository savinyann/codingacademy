<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fixture extends Model
{
    public $timestamps = FALSE;

    public function winner()
    {
    	return $this->hasOne('\App\Team', 'id', 'winner_id');
    }

    public function team1()
    {
    	return $this->hasOne('\App\Team', 'id', 'team1_id');
    }

    public function team2()
    {
    	return $this->hasOne('\App\Team', 'id', 'team2_id');
    }

    public function meteo()
    {
    	return $this->hasOne('\App\Meteo', 'id', 'meteo_id');
    }

    public function referee()
    {
    	return $this->hasOne('\App\Referee', 'id', 'referee_id');
    }
}