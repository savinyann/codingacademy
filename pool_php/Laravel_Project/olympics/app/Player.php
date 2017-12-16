<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Player extends Model
{
	use SoftDeletes;
    //
    public $timestamps = false;
    protected $date = ['deleted_at'];

    public function teams()
    {
        return $this->hasOne('\App\Team', 'id', 'team_id' );
    }
}
