<?php

use Illuminate\Database\Migrations\Migration;

class CreateCategoriesTable extends Migration
{
	public function up()
	{
		Schema::create('categories', function($t)
        {
            $t->increments('id')->unsigned();
            
            $t->string('title')->unique();
			$t->string('link')->unique();
            
            $t->timestamp('updated_at');
            $t->timestamp('created_at');
        });
	}

	public function down()
	{
		Schema::drop('categories');
	}
}