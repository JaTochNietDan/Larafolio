<?php

use Illuminate\Database\Migrations\Migration;

class CreateDownloadsTable extends Migration
{
	public function up()
	{
        Schema::create('downloads', function($t)
        {
            $t->increments('id');
            $t->string('ip')->length(16);
            
            $t->timestamps();
            
            $t->integer('release_id')->unsigned()->default(0);
			
			$t->index('release_id');
            
            $t->foreign('release_id')
			  ->references('id')
			  ->on('releases');
        });
	}
    
	public function down()
	{
        Schema::drop('downloads');
	}
}