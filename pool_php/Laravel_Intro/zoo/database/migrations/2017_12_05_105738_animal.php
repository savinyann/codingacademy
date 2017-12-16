<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Animal extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create("animal", function(Blueprint $animal)
        {
            $animal->increments("id");
            $animal->string("type");
            $animal->string("name");
            $animal->integer("gender_id")->unsigned()->nullable();
            $animal->integer("age");
            $animal->float("height");
            $animal->timestamps();
            //$animal->foreign("gender_id")->reference("id")->on("gender");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists("animal");
    }
}
