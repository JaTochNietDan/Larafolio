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
            'title' => 'min:3|max:20|required|unique:posts',
            'category_id' => 'required|exists:categories,id'
        );
        
        $valid = Validator::make(Input::all(), $rules);
        
        if($valid->fails())
            return Redirect::to(route('admin.post.create'))->withErrors($valid)->withInput(Input::all());
        
        $p = Post::create(Input::all());
        
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
        $rules = array(
            'title' => 'min:3|max:20|required|unique:posts,title,'.$id,
            'category_id' => 'required|exists:categories,id'
        );
        
        $valid = Validator::make(Input::all(), $rules);
        
        if($valid->fails())
            return Redirect::to(route('admin.post.edit', $id))->withErrors($valid)->withInput(Input::all());
        
        $p = Post::find($id);
        
        if(!$p)
            return Redirect::to(route('admin.post.index'))->withErrors(array('errors' => 'Post not found!'));
        
        $p->update(Input::all());
        
        return Redirect::to(route('admin.post.index'))->with('success', 'Post saved!');
    }
}
