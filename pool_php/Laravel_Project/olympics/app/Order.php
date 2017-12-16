<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = ['user_id', 'email', 'bet_id', 'price', 'team_selected', 'team_selected_rating'];
 
    public function user()
    {
        return $this->hasOne('App\User');
    }
 
    public function bet()
    {
        return $this->hasOne('App\Bet');
    }
}
