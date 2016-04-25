<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateImgParticipacionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('img_participacions', function (Blueprint $table) {
            $table->increments('id');
            $table->string('img');
            $table->integer('id_participacion')->unsigned();
            $table->foreign('id_participacion')
                ->references('id')
                ->on('participacions');
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
        Schema::drop('img_participacions');
    }
}
