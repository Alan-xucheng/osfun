<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommentListsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comment_lists', function (Blueprint $table) {
            $table->increments('id');
            $table->text('content');
            $table->integer('post_id');
            $table->integer('user_id');
            $table->integer('ref');//回复评论id
            $table->integer('auth_id');
            $table->string('table');//对应表的文章id
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
        Schema::drop('comment_lists');
    }
}
