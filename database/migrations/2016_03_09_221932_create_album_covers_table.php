<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAlbumCoversTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('album_covers', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->integer('album_id');
            $table->integer('category');//分类
            $table->string('media');// 图文  视频 
            $table->string('type');
            $table->string('title');
            $table->text('desc');
            $table->text('img');
            $table->integer('post_time');
            $table->integer('view');//浏览次数
            $table->longText('base64');
            $table->string('status');
            $table->integer('praise_num');
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
        Schema::drop('album_covers');
    }
}
