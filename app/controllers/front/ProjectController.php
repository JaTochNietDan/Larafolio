<?php

class ProjectController extends FrontController
{
    function index()
    {
        $c = Category::all();
        
        $categories = array();
        
        foreach($c as $category)
            if($category->projects()->first())
                $categories[] = $category;
        
        $this->layout->content = View::make('front.project.index', array('categories' => $categories));
    }
    
    function listcategory($link)
    {
        $c = Category::where('link', '=', $link)->first();
        
        if(!$c)
            return Redirect::to(route('project.index'))->withErrors(array('errors' => 'Category not found!'));
        
        $this->layout->content = View::make('front.project.list', array('category' => $c));
    }
    
    function show($c_link, $p_link, $release = 0)
    {   
        $c = Category::where('link', '=', $c_link)->first();
        
        if(!$c)
            return Redirect::to(route('project.index'))->withErrors(array('errors' => 'Category not found!'));
        
        $p = $c->projects()->where('link', '=', $p_link)->first();
        
        if(!$p)
            return Redirect::to(route('project.category', $c_link))->withErrors(array('errors' => 'Project not found!'));
        
        $data = array(
            'project' => $p,
            'latest' => $p->releases()->orderBy('created_at', 'DESC')->first(),
            'view_release' => $p->releases()->where('name', '=', $release)->first()
        );

        $this->layout->content = View::make('front.project.show', $data);
    }
    
    function download($c_link, $p_link, $release, $file)
    {
        $c = Category::where('link', '=', $c_link)->first();
        
        if(!$c)
            return Redirect::to(route('project.index'))->withErrors(array('errors' => 'Category not found!'));
        
        $p = $c->projects()->where('link', '=', $p_link)->first();
        
        if(!$p)
            return Redirect::to(route('project.category', $c_link))->withErrors(array('errors' => 'Project not found!'));
        
        $r = $p->releases()->where('name', '=', $release)->first();
        
        if(!$r)
            return Redirect::to(route('project', array($c_link, $p_link)))->withErrors(array('errors' => 'Release not found!'));
        
        $f = $r->files()->find($file);
        
        if(!$f)
            return Redirect::to(route('project.release.show', array($c_link, $p_link, $release)))->withErrors(array('errors' => 'File not found!'));
        
        $download = public_path('downloads/projects/'.$f->filename);
        
        if(!File::exists($download))
        {
            Log::error('Missing project file: '.$p->title.' | '.$r->name.' | '.$f->name);
            
            return Redirect::to(route('project.release.show', array($c_link, $p_link, $release)))
                   ->withErrors(array('errors' => 'There was an issue locating that file, an administrator has been notified.'));
        }
        
        $p->increment('downloads');
        
        while (@ob_end_flush());
        
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Transfer-Encoding: Binary'); 
        header('Content-Disposition: attachment; filename="'.str_replace(' ', '_', $p->title.'_'.$f->name.'_'.$r->name.'.'.$f->original).'"');
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: '.filesize($download));
        readfile($download);
        
        return Redirect::to(route('project.release.show', array($c_link, $p_link, $release)));
    }
}
