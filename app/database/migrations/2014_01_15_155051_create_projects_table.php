<?php

use Illuminate\Database\Migrations\Migration;

class CreateProjectsTable extends Migration
{
	public function up()
	{
		Schema::create('projects', function($t)
        {
            $t->increments('id');
            
            $t->string('title')->unique();
			$t->string('link')->unique();
            $t->text('description');
            $t->string('excerpt')->length(500);
            
            $t->integer('downloads')->default(0);
			
            $t->integer('category_id')->unsigned()->default(0);
			
			$t->index('category_id');
            
            $t->foreign('category_id')
			  ->references('id')
			  ->on('categories');
            
            $t->timestamp('updated_at');
            $t->timestamp('created_at');
        });
	}

	public function down()
	{
		Schema::drop('projects');
	}
}