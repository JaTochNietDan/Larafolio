<?php

use Illuminate\Database\Migrations\Migration;

class CreatePagesTable extends Migration
{
	public function up()
	{
		Schema::create('pages', function($t)
        {
            $t->increments('id')->unsigned();
            
            $t->string('title');
			$t->string('link')->unique();
            $t->text('content');
            
            $t->timestamp('updated_at');
            $t->timestamp('created_at');
        });
	}
    
	public function down()
	{
        Schema::drop('pages');
	}
}