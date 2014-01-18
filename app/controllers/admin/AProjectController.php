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
        
        $p = Project::create(Input::all());
        
        return Redirect::to(route('admin.project.edit', $p->id))->with('success', 'Project created!');
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
        
        $path = public_path('downloads/projects/'.$p->link.'/images');
        
        $images = array();
        
        if(File::isDirectory($path))
        {
            $files = scandir($path);
            
            foreach ($files as $key => $file)
            {
                if($file != '..' && $file != '.')
                {
                    if(in_array(pathinfo($path.'/'.$file, PATHINFO_EXTENSION), array('jpg', 'gif', 'png', 'jpeg')))
                        $images[] = $files[$key];
                }
            }
        }
        
        $data = array(
            'project' => $p,
            'project_images' => $images
        );
        
        $this->layout->content = View::make('admin.project.edit', $data);
    }
    
    function uploadimage($id)
    {
        $p = Project::find($id);
        
        if(!$p)
            return Redirect::to(route('admin.project.index'))->withErrors(array('errors' => 'Project not found!'));
        
        $rules = array(
            'file' => 'required'  
        );
        
        $v = Validator::make(Input::all(), $rules);
        
        if($v->fails())
            return Redirect::to(route('admin.project.edit', array($id)))->withErrors($v);
        
        $file = Input::file('file');
        
        if(in_array(strtolower($file->getClientOriginalExtension()), array('jpg', 'gif', 'png', 'jpeg')) === false)
            return Redirect::to(route('admin.project.edit', array($id)))->withErrors(array('errors' => 'Must be an image!'));
        
        $newfile = $file->getClientOriginalName().'_'.str_random(6).'.'.$file->getClientOriginalExtension();
        
        $file->move(public_path('downloads/projects/'.$p->link.'/images'), $newfile);
        
        return Redirect::to(route('admin.project.edit', array($id)))->with('success', 'Image uploaded!');
    }
    
    function destroyimage($id, $image)
    {
        $p = Project::find($id);
        
        if(!$p)
            return Redirect::to(route('admin.project.index'))->withErrors(array('errors' => 'Project not found!'));
        
        $path = public_path('downloads/projects/'.$p->link.'/images');
        
        if(!File::exists($path.'/'.$image))
            return Redirect::to(route('admin.project.edit', array($id)))->withErrors(array('errors' => 'Image not found!'));
        
        File::delete($path.'/'.$image);
        
        return Redirect::to(route('admin.project.edit', array($id)))->with('success', 'Image deleted!');
    }
}
