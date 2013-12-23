<?php

class PostController extends FrontController
{
    function index()
    {
        $posts = Post::all();
        
        $data = array('posts' => $posts);
        
        $this->layout->content = View::make('front/posts/index', $data);
    }
    
    function show()
    {
        return 'Showtime!';
    }
}