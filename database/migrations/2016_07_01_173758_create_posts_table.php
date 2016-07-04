<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('post', function (Blueprint $table){
      $table->increments('id');
      $table->integer('author_id')->unsigned()->default(0);
      $table->foreign('author_id')
          ->references('id')->on('admins')
          ->onDelete('cascade');
      $table->string('title')->unique();
      $table->text('content');
      $table->string('slug')->unique();
	  $table->string('featured_image');
      $table->boolean('active');
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
        Schema::drop('post');
    }
}
