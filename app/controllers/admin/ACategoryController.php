<?php

class ACategoryController extends AdminController
{
    function index()
    {
        $c = Category::where('id', '>', 0)->get();
        
        $data = array(
            'categories' => $c  
        );
        
        $this->layout->content = View::make('admin.category.index', $data);
    }
    
    function update($id)
    {
        $v = Validator::make(Input::all(), Category::update_rules());
        
        if($v->fails())
            return Redirect::to(route('admin.category.index'))->withErrors($v);
        
        $c = Category::find($id);
        
        if(!$c)
            return Redirect::to(route('admin.category.index'))->withErrors(array('errors' => 'Category not found!'));
        
        $c->update(Input::all());
        
        return Redirect::to(route('admin.category.index'))->with('success', 'Category updated!');
    }
    
    function store()
    { 
        $v = Validator::make(Input::all(), Category::update_rules());
        
        if($v->fails())
            return Redirect::to(route('admin.category.index'))->withErrors($v);
        
        Category::create(Input::all());
        
        return Redirect::to(route('admin.category.index'))->with('success', 'Category created!');
    }
    
    function destroy($id)
    {
        $c = Category::find($id);
        
        if($c)
            $c->Delete();
        
        return Redirect::to(route('admin.category.index'))->with('success', 'Category deleted!');
    }
}
