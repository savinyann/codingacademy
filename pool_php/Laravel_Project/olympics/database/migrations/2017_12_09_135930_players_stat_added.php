<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class PlayersStatAdded extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('players', function (Blueprint $table)
        {
            //$table->integer('HP')->unsigned()->default(0);
            $table->tinyInteger('SP')->unsigned()->default(0);
            $table->tinyInteger('EN')->unsigned()->default(0);
            $table->tinyInteger('AT')->unsigned()->default(0);
            $table->tinyInteger('PA')->unsigned()->default(0);
            $table->tinyInteger('BL')->unsigned()->default(0);
            $table->tinyInteger('SH')->unsigned()->default(0);
            $table->tinyInteger('CA')->unsigned()->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
