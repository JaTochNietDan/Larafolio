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
	}

	public function down()
	{
		Schema::drop('releases');
	}
}