<?php

class SettingsController extends AdminController
{
    function showmenu()
    {
        // Session::remove('success');        
        
        $this->layout->content = View::make('admin.settings.menu');
    }
    
    function savemenu()
    {  
        $menu = array();
        
        foreach(Input::get('item') as $item)
        {
            if(!empty($item['title']))
                $menu[] = $item;
        }
        
        Cache::forever('menu-items', $menu);
        
        return Redirect::to(route('admin.settings.menu'))->with('success', 'Menu saved!');
    }
    
    function showgeneral()
	{
		$data = array(
			'sitetitle' => Cache::get('site-title'),
			'sitename' => Cache::get('site-name'),
			'postspage' => Cache::get('posts-page'),
			'dateformat' => Cache::get('date-format')
		);
		
		$this->layout->content = View::make('admin.settings.general', $data);
	}
	
	function savegeneral()
	{
		$rules = array(
			'site-title' => 'max:13',
			'site-name' => 'max:13',
			'posts-page' => 'integer|required',
			'date-format' => 'required'
		);
		
		$v = Validator::make(Input::all(), $rules);
		
		if($v->fails())
			return Redirect::to(route('admin.settings.general'))->withErrors($v)->withInput(Input::all());
		
		Cache::forever('site-title', Input::get('site-title'));
		Cache::forever('site-name', Input::get('site-name'));
		Cache::forever('posts-page', Input::get('posts-page'));
		Cache::forever('date-format', Input::get('date-format'));
		
		return Redirect::to(route('admin.settings.general'))->with('success', 'Website settings have been saved!');
	}
}
