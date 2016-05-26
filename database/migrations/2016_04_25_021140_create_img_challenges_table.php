<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateImgChallengesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('img_challenges', function (Blueprint $table) {
            $table->increments('id');
            $table->string('img');
            $table->integer('id_challenge')->unsigned();
            $table->foreign('id_challenge')
                ->references('id')
                ->on('challenges');
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
        Schema::drop('img_challenges');
    }
}
