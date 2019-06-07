<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBu extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bus', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name' , '100');
            $table->double('price');
            $table->integer('rooms');
            $table->boolean('rent');
            $table->string('square' , '10');
            $table->boolean('type');
            $table->string('small_desc' , '160');
            $table->string('meta','200');
            $table->string('longitude','50');
            $table->string('latitude','50');
            $table->longText('large_desc');
            $table->boolean('status');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
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
        Schema::dropIfExists('bus');
    }
}
