<?php

class APostController extends AdminController
{
    function index()
    {
        $posts = Post::take(Cache::get('posts-page'))->orderBy('created_at', 'desc')->get();
        
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
        $valid = Validator::make(Input::all(), Post::store_rules());
        
        if($valid->fails())
            return Redirect::to(route('admin.post.create'))->withErrors($valid)->withInput();
        
        $data = Input::except('published');
        $data['published'] = Input::get('published', 0);
        
        $p = Post::create($data);
        
        return Redirect::to(route('admin.post.index'))->with('success', 'Post created!');
    }
    
    function edit($id)
    {
        $p = Post::find($id);
        
        if(!$p)
            return Redirect::to(route('admin.post.index'))->withErrors(array('errors' => 'Post not found!'));
        
        $data = array(
            'post' => $p  
        );
        
        $this->layout->content = View::make('admin.posts.edit', $data);
    }
    
    function update($id)
    {
        $valid = Validator::make(Input::all(), Post::update_rules($id));
        
        if($valid->fails())
            return Redirect::to(route('admin.post.edit', $id))->withErrors($valid)->withInput();
        
        $p = Post::find($id);
        
        if(!$p)
            return Redirect::to(route('admin.post.index'))->withErrors(array('errors' => 'Post not found!'));
        
        $data = Input::except('published');
        $data['published'] = Input::get('published', 0);
        
        $p->update($data);
        
        return Redirect::to(route('admin.post.index'))->with('success', 'Post saved!');
    }
}
