<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLeaderboardsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('leaderboards', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('player_id');
            $table->unsignedBigInteger('tour_id');
            $table->string('stage');
            $table->string('t1');
            $table->string('t2');
            $table->string('tResult');
            $table->boolean('pc0')->default(false);
            $table->string('time_pc0');
            $table->boolean('pc1')->default(false);
            $table->string('time_pc1');
            $table->boolean('pc2')->default(false);
            $table->string('time_pc2');
            $table->boolean('pc3')->default(false);
            $table->string('time_pc3');
            $table->boolean('pc4')->default(false);
            $table->string('time_pc4');
            $table->boolean('pc5')->default(false);
            $table->string('time_pc5');
            $table->boolean('pc6')->default(false);
            $table->string('time_pc6');
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
        Schema::dropIfExists('leaderboards');
    }
}
