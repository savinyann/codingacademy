<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFuxturesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fixtures', function (Blueprint $table)
        {
            $table->increments('id');
            $table->dateTime('date');
            $table->string('scoreboard');
            $table->integer('winner_id');
            $table->integer('team1_id');
            $table->integer('team2_id');
            $table->integer('placement');
            $table->integer("meteo_id");
            $table->integer('goals');
            $table->integer('faults');
            $table->integer('referee_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('fixtures');
    }
}
