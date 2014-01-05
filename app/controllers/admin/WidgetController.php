<?php

class WidgetController extends AdminController
{
    function index()
    {
        $w = Cache::get('widgets');
        
        $this->layout->content = View::make('admin.settings.widget.index', array('widgets' => $w));
    }
    
    function edit($id)
    {
        if(!isset(Cache::get('widgets')[$id]))
            return Redirect::to(route('admin.settings.widget.index'))->withErrors(array('errors' => 'Incorrect ID specified!'));
        
        $w = Cache::get('widgets')[$id];
        
        $this->layout->content = View::make('admin.settings.widget.edit', array('widget' => $w, 'id' => $id));
    }
    
    function update($id)
    {
        $widgets = Cache::get('widgets');
        
        if(!isset($widgets[$id]))
            return Redirect::to(route('admin.settings.widget.index'))->withErrors(array('errors' => 'Incorrect ID specified!'));
        
        $rules = array(
            'title' => 'required|min:3|max:15',
            'type' => 'required'
        );
        
        $v = Validator::make(Input::all(), $rules);
        
        if($v->fails() || !in_array(Input::get('type'), Cache::get('widget-types')))
            return Redirect::to(route('admin.settings.widget.edit', $id))->withErrors($v)->withInput(Input::all());
        
        $widgets[$id]['title'] = Input::get('title');
        $widgets[$id]['type'] = Input::get('type');
        $widgets[$id]['content'] = Input::get('content');
        
        Cache::forever('widgets', $widgets);
        
        return Redirect::to(route('admin.settings.widget.index'))->with('success', 'Widget saved!');
    }
    
    function create()
    {
        $this->layout->content = View::make('admin.settings.widget.create');
    }

    function store()
    {
        $rules = array(
            'title' => 'required|min:3|max:15',
            'type' => 'required'
        );
        
        $v = Validator::make(Input::all(), $rules);
        
        if($v->fails() || !in_array(Input::get('type'), Cache::get('widget-types')))
            return Redirect::to(route('admin.settings.widget.create'))->withErrors($v)->withInput(Input::all());
        
        $widgets = Cache::get('widgets');
        
        $widgets[] = array(
            'title' => Input::get('title'),
            'type' => Input::get('type'),
            'content' => Input::get('content')
        );
        
        Cache::forever('widgets', $widgets);
        
        return Redirect::to(route('admin.settings.widget.index'))->with('success', 'Widget added!');
    }
    
    function destroy($id)
    {
        $widgets = Cache::get('widgets');
        
        if(!isset($widgets[$id]))
            return Redirect::to(route('admin.settings.widget.index'))->withErrors(array('errors' => 'Incorrect ID specified!'));
        
        unset($widgets[$id]);
        
        Cache::forever('widgets', $widgets);
        
        return Redirect::to(route('admin.settings.widget.index'))->with('success', 'Widget deleted!');
    }
}
