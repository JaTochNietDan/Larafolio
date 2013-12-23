<?php

use Illuminate\Database\Migrations\Migration;

class CreatePostsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('posts', function($t)
        {
            $t->increments('id');
            
            $t->string('title')->unique();
            $t->text('content');
            $t->string('excerpt');
            
            $t->smallInteger('category_id');
            
            $t->foreign('category_id')->references('id')->on('categories');
            
            $t->timestamp('updated_at');
            $t->timestamp('created_at');
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('posts');
	}

}