<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Referee extends Model
{
	use SoftDeletes;

    public $timestamps = FALSE;
    protected $date = ['deleted_at'];

}
