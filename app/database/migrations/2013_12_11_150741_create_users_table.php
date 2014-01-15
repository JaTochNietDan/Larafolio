<?php

use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
	public function up()
	{
		Schema::create('users', function($t)
        {
            $t->increments('id');
            
            $t->string('email');
            $t->string('password');
			
            $t->timestamp('updated_at');
            $t->timestamp('created_at');
        });   
	}

	public function down()
	{
		Schema::drop('users');
	}
}