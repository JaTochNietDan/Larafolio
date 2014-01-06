<?php

class DatabaseSeeder extends Seeder
{
	public function run()
	{
		Eloquent::unguard();

		User::create(array(
			'email' => 'demo@demo.com',
			'password' => Hash::make('demo')
		));
		
		Category::create(array(
			'title' => 'First Category'
		))->posts()->create(array(
			'title' => 'Hello World',
			'published' => true,
			'content' => 'This is the first post in the first category!'
		));
		
		$this->call('CacheSeeder');
	}
}