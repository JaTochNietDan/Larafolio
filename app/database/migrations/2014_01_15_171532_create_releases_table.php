<?php

use Illuminate\Database\Migrations\Migration;

class CreateReleasesTable extends Migration
{
	public function up()
	{
		Schema::create('releases', function($t)
        {
            $t->increments('id');
            
            $t->string('name');
            $t->text('changelog');

            $t->integer('project_id')->unsigned()->default(0);
			
			$t->index('project_id');
            
            $t->foreign('project_id')
			  ->references('id')
			  ->on('projects');
            
            $t->timestamp('updated_at');
            $t->timestamp('created_at');
        });
        
        Schema::create('uploads', function($t)
        {
            $t->increments('id');
            
            $t->string('name');
            $t->string('original');
            $t->string('filename');

            $t->integer('release_id')->unsigned();
            
            $t->foreign('release_id')
			  ->references('id')
			  ->on('releases');
            
            $t->timestamp('updated_at');
            $t->timestamp('created_at');
        });
	}

	public function down()
	{
		Schema::drop('releases');
        Schema::drop('uploads');
	}
}