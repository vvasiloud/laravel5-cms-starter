<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostTagTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('relations_post_tag', function (Blueprint $table){
            $table->integer('post_id')->unsigned()->index();
            $table->integer('tag_id')->unsigned()->index();
            $table->timestamps(); 
        }); 
        
        Schema::table('relations_post_tag', function ($table){
            $table->foreign('post_id')->references('id')->on('post')->onDelete('cascade');
            $table->foreign('tag_id')->references('id')->on('tag')->onDelete('cascade'); 
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('relations_post_tag');
    }
}
