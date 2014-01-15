<?php

class ACategoryController extends AdminController
{
    function blogindex()
    {
        $c = Category::where('id', '>', 0)->where('projects', '=', 0)->get();
        
        $data = array(
            'categories' => $c  
        );
        
        $this->layout->content = View::make('admin.category.blogindex', $data);
    }
    
    function projectindex()
    {
        $c = Category::where('id', '>', 0)->where('projects', '=', 1)->get();
        
        $data = array(
            'categories' => $c  
        );
        
        $this->layout->content = View::make('admin.category.projectindex', $data);
    }
    
    private function getModifier()
    {
        if(isset($_SERVER['HTTP_REFERER']))
        {
            $referer = explode('/', $_SERVER['HTTP_REFERER']);
            
            if(isset($referer[4]))
                return $referer[4];
        }
        else return 'post';
    }
    
    function update($id)
    {
        $modifier = $this->getModifier();
        
        $v = Validator::make(Input::all(), Category::update_rules());
        
        if($v->fails())
            return Redirect::to(route('admin.'.$modifier.'.category.index'))->withErrors($v);
        
        $c = Category::find($id);
        
        if(!$c)
            return Redirect::to(route('admin.'.$modifier.'.category.index'))->withErrors(array('errors' => 'Category not found!'));
        
        $c->update(Input::all());
        
        return Redirect::to(route('admin.'.$modifier.'.category.index'))->with('success', 'Category updated!');
    }
    
    function store()
    {
        $modifier = $this->getModifier();
        
        $v = Validator::make(Input::all(), Category::update_rules());
        
        if($v->fails())
            return Redirect::to(route('admin.'.$modifier.'.category.index'))->withErrors($v);
        
        Category::create(Input::all());
        
        return Redirect::to(route('admin.'.$modifier.'.category.index'))->with('success', 'Category created!');
    }
    
    function destroy($id)
    {
        $modifier = $this->getModifier();
        
        $c = Category::find($id);
        
        if($c)
            $c->Delete();
        
        return Redirect::to(route('admin.'.$modifier.'.category.index'))->with('success', 'Category deleted!');
    }
}
