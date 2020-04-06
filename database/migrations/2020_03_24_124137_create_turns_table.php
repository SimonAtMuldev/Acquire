<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTurnsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Create 196 tiles for the enum
        $tiles=[];
        for($i = 1; $i <= 196; $i++) {$tiles[]= $i;}

        Schema::create('turns', function (Blueprint $table) use ($tiles) {
            $table->bigInteger('id');
            $table->bigInteger('player_id')->unsigned();
            $table->foreign('player_id')->references('id')->on('users');
            $table->bigInteger('game_id')->unsigned();
            $table->foreign('game_id')->references('id')->on('games');
            $table->enum('location', $tiles)->nullable();
            $table->enum('filled', [ 0, 1 ]);
            $table->primary(['id','game_id']);
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
        Schema::dropIfExists('turns');
    }
}
