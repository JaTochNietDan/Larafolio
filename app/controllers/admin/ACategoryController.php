<?php

class ACategoryController extends AdminController
{
    private $bag;
    
    public function __construct()
    {
        $this->bag = array(
            'type' => Lang::choice('type.category', 1)
        );
    }
    
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
            return Redirect::to(route('admin.category.index'))->withErrors(trans('error.notfound', $this->bag));
        
        $c->update(Input::all());
        
        return Redirect::to(route('admin.category.index'))->with('success', trans('message.updated', $this->bag));
    }
    
    function store()
    { 
        $v = Validator::make(Input::all(), Category::update_rules());
        
        if($v->fails())
            return Redirect::to(route('admin.category.index'))->withErrors($v);
        
        Category::create(Input::all());
        
        return Redirect::to(route('admin.category.index'))->with('success', trans('message.created', $this->bag));
    }
    
    function destroy($id)
    {
        $c = Category::find($id);
        
        if($c)
            $c->Delete();
        
        return Redirect::to(route('admin.category.index'))->with('success', trans('message.deleted', $this->bag));
    }
}
