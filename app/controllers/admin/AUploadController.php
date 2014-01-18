<?php

class AUploadController extends AdminController
{
    function store($p, $r)
    {
        if(!Input::has('name'))
            return Redirect::to(route('admin.project.release.edit', array($p, $r)))->withErrors(array('errors' => 'Please enter a name for the file!'));
        
        if(!Input::hasFile('file'))
            return Redirect::to(route('admin.project.release.edit', array($p, $r)))->withErrors(array('errors' => 'No file selected!'));
        
        $file = Input::file('file');
        
        $newfile = str_random(20);
        
        $file->move(public_path('downloads/projects'), $newfile);
        
        Release::find($r)->files()->create(array(
            'name' => Input::get('name'),
            'original' => $file->getClientOriginalExtension(),
            'filename' => $newfile  
        ));
        
        return Redirect::to(route('admin.project.release.edit', array($p, $r)))->with('success', 'File uploaded!');
    }
    
    function destroy($p, $r, $f)
    {
        $file = Upload::find($f);
        
        if(!$file)
            return Redirect::to(route('admin.project.release.edit', array($p, $r)))->withErrors(array('errors' => 'File not found!'));
        
        File::delete(public_path('downloads/projects/'.$file->filename));
        
        $file->delete();
        
        return Redirect::to(route('admin.project.release.edit', array($p, $r)))->with('success', 'File deleted!');
    }
}
