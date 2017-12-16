<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TableFixtureNewColumnTournament extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tournament', function (Blueprint $table)
        {
            $table->increments('id');
            $table->string('teams_id');
            $table->integer('price');
            $table->timestamps();
        });

        Schema::table('fixtures', function (Blueprint $table)
        {
            $table->integer('tournament_id')->default(0);
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
