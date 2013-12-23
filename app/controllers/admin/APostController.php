<?php

class APostController extends AdminController
{
    function index()
    {
        $posts = Post::take(Cache::get('posts-page'))->get();
        
        $data = array('posts' => $posts);
        
        $this->layout->content = View::make('admin.posts.index', $data);
    }
    
    function destroy($id)
    { 
        $p = Post::find($id);
        
        if($p)
        {
            $p->Delete();
            
            return Redirect::to(route('admin.post.index'))->with('success', 'Post deleted!');
        }
    }
    
    function create()
    {
        $this->layout->content = View::make('admin.posts.create');
    }
    
    function store()
    {
        $rules = array(
            'title' => 'min:3|max:20|required',
            'category' => 'required'
        );
        
        $valid = Validator::make(Input::all(), $rules);
        
        if($valid->fails())
            return Redirect::to(route('admin.post.create'))->withErrors($valid)->withInput(Input::all());
        
        $c = Category::find(Input::get('category'));
        
        if(!$c)
            return Redirect::to(route('admin.post.create'))->withErrors(array('errors' => 'Invalid category specified'))->withInput(Input::all());
        
        $p = $c->posts()->create(Input::except(array('_token', 'category')));
        
        return Redirect::to(route('admin.post.index'))->with('success', 'Post created!');
    }
}
