<?php

class AProjectController extends AdminController
{
    function index()
    {
        $p = Project::all();
        
        $this->layout->content = View::make('admin.project.index', array('projects' => $p));
    }
    
    function create()
    {
        $this->layout->content = View::make('admin.project.create');
    }
    
    function store()
    {
        $v = Validator::make(Input::all(), Project::store_rules());
        
        if($v->fails())
            return Redirect::to(route('admin.project.create'))->withErrors($v)->withInput(Input::all());
        
        Project::create(Input::all());
        
        return Redirect::to(route('admin.project.index'))->with('success', 'Project created!');
    }
    
    function destroy($id)
    {
        $p = Project::find($id);
        
        if(!$p)
            return Redirect::to(route('admin.project.create'))->withErrors(array('errors' => 'Project not found!'));
        
        $p->delete();
        
        return Redirect::to(route('admin.project.index'))->with('success', 'Project deleted!');
    }
    
    function update($id)
    {
        $p = Project::find($id);
        
        if(!$p)
            return Redirect::to(route('admin.project.create'))->withErrors(array('errors' => 'Project not found!'));
        
        $p->update(Input::all());
        
        return Redirect::to(route('admin.project.index'))->with('success', 'Project edited!');
    }
    
    function edit($id)
    {
        $p = Project::find($id);
        
        if(!$p)
            return Redirect::to(route('admin.project.create'))->withErrors(array('errors' => 'Project not found!'));
        
        $this->layout->content = View::make('admin.project.edit', array('project' => $p));
    }
}
