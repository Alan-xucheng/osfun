<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserExtrasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_extras', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->string('nickname');
            $table->integer('age');    
            $table->string('sex');
            $table->text('desc');
            $table->string('province');
            $table->string('city');
            $table->string('county');
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
        Schema::drop('user_extras');
    }
}
