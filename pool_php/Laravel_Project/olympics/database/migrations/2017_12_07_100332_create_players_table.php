<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlayersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('players', function (Blueprint $table)
        {
            $table->increments('id');
            $table->string('name');
            $table->integer('team_id');
            $table->date('birthdate');
            $table->integer('goals')->default(0);
            $table->integer('w')->default(0);
            $table->integer('l')->default(0);
            $table->integer('faults')->default(0);
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('players');
    }
}
