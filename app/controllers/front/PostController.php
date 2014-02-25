<?php

class PostController extends FrontController
{
    function index($c = null)
    {
        if($c)
            $posts = $c->posts()->where('published', '!=', 0)->orderBy('created_at', 'desc')->paginate(10);
        else
            $posts = Post::where('published', '!=', 0)->orderBy('created_at', 'desc')->paginate(10);
        
        $data = array('posts' => $posts, 'category' => $c);
        
        $this->layout->content = View::make('front/posts/index', $data);
    }
    
    function page($page)
    {
    
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
                   
        $data = array(
            'post' => $p  
        );
                   
        $this->layout->content = View::make('front/posts/show', $data);
    }
    
    function listcategory($category_link)
    {
        $c = Category::where('link', $category_link)->first();
        
        if(!$c)
            return Redirect::to('/')->withErrors(array('errors' => 'Category not found!'));
        
        $this->index($c);
    }
}