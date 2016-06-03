<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateParticipacionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('participacions', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_challenge')->unsigned();
            $table->integer('id_user')->unsigned();
            $table->string('title'); 
            $table->string('video');
            $table->longText('poster'); 
            $table->string('description');  
            $table->timestamps();            
            $table->foreign('id_challenge')
                ->references('id')
                ->on('challenges');
            $table->foreign('id_user')
                ->references('id')
                ->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('participacions');
    }
}
