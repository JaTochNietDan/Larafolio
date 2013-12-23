<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();

		User::create(array(
			'email' => 'demo@demo.com',
			'password' => Hash::make('demo')
		));
		
		$c = Category::create(array(
			'title' => 'Technology'	
		));
		
		Category::create(array(
			'title' => 'PHP'
		));
		
		$c->posts()->create(array(
			'title' => 'Hello World',
			'content' => 'My first post!',
			'excerpt' => 'First excerpt'
		));
		
		$this->call('CacheSeeder');
	}

}