<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostCategoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('relations_post_category', function (Blueprint $table){
            $table->integer('post_id')->unsigned()->index();
            $table->integer('category_id')->unsigned()->index();
            $table->timestamps(); 
        }); 
        
        Schema::table('relations_post_category', function ($table){
            $table->foreign('post_id')->references('id')->on('post')->onDelete('cascade');
            $table->foreign('category_id')->references('id')->on('category')->onDelete('cascade'); 
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('relations_post_category');
    }
}
