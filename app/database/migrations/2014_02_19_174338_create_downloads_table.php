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

            $t->integer('upload_id')->unsigned()->default(0);
              
            $t->index('upload_id');
            
            $t->foreign('upload_id')
			  ->references('id')
			  ->on('uploads');
        });
	}
    
	public function down()
	{
        Schema::drop('downloads');
	}
}