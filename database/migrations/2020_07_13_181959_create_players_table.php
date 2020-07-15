<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlayersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('players', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('team_id')->unsigned();
            //$table->foreign('team_id')->references('id')->on('teams');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('image');
            $table->integer('jersey_number');
            $table->string('country');
            $table->integer('matches')->default(0);
            $table->integer('runs')->default(0);
            $table->integer('highest_score')->default(0);
            $table->integer('fifties')->default(0);
            $table->integer('hundreds')->default(0);
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
