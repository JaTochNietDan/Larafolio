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
}
