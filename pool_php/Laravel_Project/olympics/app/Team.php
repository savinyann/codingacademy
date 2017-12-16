<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Team extends Model
{
    //
    use SoftDeletes;

    public $timestamps = FALSE;
    protected $date = ["deleted_at"];

    public function players()
    {
    	return $this->hasMany('\App\Player', 'team_id', 'id');
    }
}
