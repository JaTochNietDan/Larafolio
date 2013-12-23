<?php

class PostController extends FrontController
{
    function index($c = null)
    {
        if($c)
            $posts = $c->posts()->take(Cache::get('posts-page', 10))->get();
        else
            $posts = Post::take(Cache::get('posts-page', 10))->get();
        
        $data = array('posts' => $posts);
        
        $this->layout->content = View::make('front/posts/index', $data);
    }
    
    function show($category_link, $post_link)
    {
        $c = Category::where('link', $category_link)->first();
        
        if(!$c)
            return Redirect::to('/')->withErrors(array('errors' => 'Category not found!'));
        
        $p = $c->posts()->where('link', $post_link)->first();
        
        if(!$p)
            return Redirect::to(action('PostController@listcategory', $category_link))
                   ->withErrors(array('errors' => 'Post not found!'));
    }
    
    function listcategory($category_link)
    {
        $c = Category::where('link', $category_link)->first();
        
        if(!$c)
            return Redirect::to('/')->withErrors(array('errors' => 'Category not found!'));
        
        $this->index($c);
    }
}