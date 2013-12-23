<?php

class CacheSeeder extends Seeder
{
    public function run()
    {
        Cache::forever('site-title', 'Larafolio');
        Cache::forever('site-name', 'Larafolio');
        Cache::forever('posts-page', 10);
        Cache::forever('date-format', '\a\t H:i \o\n l \t\h\e jS \o\f F Y');
    }
}