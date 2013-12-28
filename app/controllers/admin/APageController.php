<?php

class APageController extends AdminController
{
    function index()
    {
        $p = Page::all();
        
        $data = array(
            'pages' => $p
        );
        
        $this->layout->content = View::make('admin.page.index', $data);
    }
    
    function create()
    {
        $this->layout->content = View::make('admin.page.create');
    }
    
    function store()
    {
        $v = Validator::make(Input::all(), Page::store_rules());
        
        if($v->fails())
            return Redirect::to(route('admin.page.create'))->withErrors($v)->withInput();
        
        Page::create(Input::all());
        
        return Redirect::to(route('admin.page.index'))->with('success', 'Page created!');
    }
    
    function edit($id)
    {
        $p = Page::find($id);
        
        if(!$p)
            return Redirect::to(route('admin.page.index'))->withErrors(array('errors' => 'Page not found!'));
        
        $this->layout->content = View::make('admin.page.edit', array('page' => $p));
    }
    
    function update($id)
    {
        $p = Page::find($id);
        
        if(!$p)
            return Redirect::to(route('admin.page.index'))->withErrors(array('errors' => 'Page not found!'));
        
        $v = Validator::make(Input::all(), Page::update_rules($id));
        
        if($v->fails())
            return Redirect::to(route('admin.page.edit', $id))->withErrors($v)->withInput();
        
        $p->update(Input::all());
        
        return Redirect::to(route('admin.page.index'))->with('success', 'Page saved!');
    }
    
    function destroy($id)
    {
        $p = Page::find($id);
        
        if($p)
            $p->delete();
            
        return Redirect::to(route('admin.page.index'))->with('success', 'Page deleted!');
    }
}
