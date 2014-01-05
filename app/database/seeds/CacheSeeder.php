<?php

class CacheSeeder extends Seeder
{
    public function run()
    {
        Cache::forever('site-title', 'Larafolio');
        Cache::forever('site-name', 'Larafolio');
        Cache::forever('posts-page', 10);
        Cache::forever('date-format', '\a\t H:i \o\n l \t\h\e jS \o\f F Y');
        
        Cache::forever('menu-items', array(
            array(
                'title' => 'Blog',
                'icon' => 'home',
                'link' => '/blog'
            )
        ));
        
        Cache::forever('widget-types', array(
           'categories',
           'recentposts',
           'custom'
        ));
        
        Cache::forever('widgets', array(
            array(
                'title' => 'Categories',
                'type' => 'categories',
                'icon' => 'folder-open'
            ),
            array(
                'title' => 'Recent Posts',
                'type' => 'recentposts',
                'icon' => 'list-alt'
            ),
            array(
                'title' => 'Blog Roll',
                'type' => 'custom',
                'content' => 'Thug lyfe',
                'icon' => 'user'
            )
        ));
    }
}