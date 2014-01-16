<?php

class SettingsController extends AdminController
{
    function showmenu()
    {
        $this->layout->content = View::make('admin.settings.menu');
    }
    
    function savemenu()
    {  
        $menu = array();
        
        if(Input::has('item'))
        {
            foreach(Input::get('item') as $item)
            {
                if(!empty($item['title']))
                    $menu[] = $item;
            }
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
			'dateformat' => Cache::get('date-format'),
			'footer' => Cache::get('footer'),
			'tracking' => Cache::get('analytics'),
			'disqus' => Cache::get('disqus')
		);
		
		$this->layout->content = View::make('admin.settings.general', $data);
	}
	
	function savegeneral()
	{
		$rules = array(
			'site-title' => 'required|max:13',
			'site-name' => 'required|max:13',
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
		Cache::forever('footer', Input::get('footer'));
		Cache::forever('disqus', Input::get('disqus'));
		Cache::forever('analytics', Input::get('tracking'));
		
		return Redirect::to(route('admin.settings.general'))->with('success', 'Website settings have been saved!');
	}
	
	function showprofile()
	{
		$data = array(
			'email' => Auth::user()->email
		);
		
		$this->layout->content = View::make('admin.settings.profile', $data);
	}
	
	function saveprofile()
	{
		$rules = array(
			'email' => 'required|email'
		);
		
		$v = Validator::make(Input::all(), $rules);
		
		if($v->fails())
			return Redirect::to(route('admin.settings.profile'))->withErrors($v);
		
		if(Input::get('newpass'))
		{
			if(Input::get('newpass') != Input::get('confirmpass'))
				return Redirect::to(route('admin.settings.profile'))->withErrors(array('errors' => 'Password\'s didn\'t match!'));
			
			Auth::user()->update(array(
				'email' => Input::get('email'),
				'password' => Hash::make(Input::get('newpass'))
			));
			
			return Redirect::to(route('admin.settings.profile'))->with('success', 'Changed your password!');
		}
		
		Auth::user()->update(array(
			'email' => Input::get('email')
		));
		
		return Redirect::to(route('admin.settings.profile'))->with('success', 'Updated your profile!');
	}
}
