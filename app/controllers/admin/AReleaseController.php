<?php

class AReleaseController extends AdminController
{
    function create($project_id)
    {
        $p = Project::find($project_id);
        
        if(!$p)
            return Redirect::to(route('admin.project.index'))->withErrors(array('errors' => 'Project not found!'));
        
        $this->layout->content = View::make('admin.project.release.create', array('project' => $p));
    }
    
    function edit($project_id, $id)
    {
        $p = Project::find($project_id);
        
        if(!$p)
            return Redirect::to(route('admin.project.index'))->withErrors(array('errors' => 'Project not found!'));
        
        $r = $p->releases()->find($id);
        
        if(!$r)
            return Redirect::to(route('admin.project.edit', $project_id))->withErrors(array('errors' => 'Release not found!'));
        
        $data = array(
            'project' => $p,
            'release' => $r
        );
        
        $this->layout->content = View::make('admin.project.release.edit', array($project_id, $id))->with($data);
    }
    
    function update($project_id, $id)
    {
        $p = Project::find($project_id);
        
        if(!$p)
            return Redirect::to(route('admin.project.index'))->withErrors(array('errors' => 'Project not found!'));
        
        $r = $p->releases()->find($id);
        
        if(!$r)
            return Redirect::to(route('admin.project.edit', $project_id))->withErrors(array('errors' => 'Release not found!'));
        
        $v = Validator::make(Input::all(), Release::store_rules());
        
        if($v->fails())
            return Redirect::to(route('admin.project.release.edit', array($project_id, $id)))->with(array('project' => $p))->withErrors($v)->withInput(Input::all());
        
        $r->update(Input::except(array('_token')));
        
        return Redirect::to(route('admin.project.edit', $project_id))->with('success', 'Release updated!'); 
    }
    
    function store($project_id)
    {
        $p = Project::find($project_id);
        
        if(!$p)
            return Redirect::to(route('admin.project.index'))->withErrors(array('errors' => 'Project not found!'));
        
        $v = Validator::make(Input::all(), Release::store_rules());
        
        if($v->fails())
            return Redirect::to(route('admin.project.release.create', $project_id))->with(array('project' => $p))->withErrors($v)->withInput(Input::all());
        
        $p->releases()->create(Input::except(array('_token')));
        
        return Redirect::to(route('admin.project.edit', $project_id))->with('success', 'Release created!');
    }
    
    function destroy($project_id, $id)
    {
        $p = Project::find($project_id);
        
        if(!$p)
            return Redirect::to(route('admin.project.index'))->withErrors(array('errors' => 'Project not found!'));
        
        $r = $p->releases()->find($id);
        
        if(!$r)
            return Redirect::to(route('admin.project.edit', $project_id))->withErrors(array('errors' => 'Release not found!'));
        
        $r->delete();
        
        return Redirect::to(route('admin.project.edit', $project_id))->with('success', 'Release deleted!');
    }
}