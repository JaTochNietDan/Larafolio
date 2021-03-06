<?php

class APageController extends AdminController
{
    private $bag;
    
    public function __construct()
    {
        $this->bag = array(
            'type' => Lang::choice('type.page', 1)
        );
    }
    
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
        
        return Redirect::to(route('admin.page.index'))->with('success', trans('message.created', $this->bag));
    }
    
    function edit($id)
    {
        $p = Page::find($id);
        
        if(!$p)
            return Redirect::to(route('admin.page.index'))->withErrors(trans('error.notfound', $this->bag));
        
        $this->layout->content = View::make('admin.page.edit', array('page' => $p));
    }
    
    function update($id)
    {
        $p = Page::find($id);
        
        if(!$p)
            return Redirect::to(route('admin.page.index'))->withErrors(trans('error.notfound', $this->bag));
        
        $v = Validator::make(Input::all(), Page::update_rules($id));
        
        if($v->fails())
            return Redirect::to(route('admin.page.edit', $id))->withErrors($v)->withInput();
        
        $p->update(Input::all());
        
        return Redirect::to(route('admin.page.index'))->with('success', trans('message.updated', $this->bag));
    }
    
    function destroy($id)
    {
        $p = Page::find($id);
        
        if($p)
            $p->delete();
            
        return Redirect::to(route('admin.page.index'))->with('success', trans('message.deleted', $this->bag));
    }
}
