<?php

class CacheSeeder extends Seeder
{
    public function run()
    {
        Cache::forever('site-title', 'Larafolio');
        Cache::forever('site-name', 'Larafolio');
        Cache::forever('posts-page', 10);
    }
}