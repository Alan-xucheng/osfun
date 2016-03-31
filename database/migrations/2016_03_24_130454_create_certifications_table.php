<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCertificationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('certifications', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->string('type');
            $table->integer('location_id');
            $table->integer('category');
            $table->text('service_desc');
            $table->string('service_type');
            $table->string('size');//团队规模 one  less than10  more than 10 
            $table->string('province');
            $table->string('city');
            $table->string('country');
            $table->string('true_name');
            $table->text('front_id');
            $table->text('back_id');
            $table->string('status');

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
        Schema::drop('certifications');
    }
}
