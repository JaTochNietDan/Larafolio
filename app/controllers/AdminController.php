<?php

class AdminController extends Controller
{
	protected $layout = 'admin.layout';
	
	protected function setupLayout()
	{
		if (!is_null($this->layout))
		{
			$this->layout = View::make($this->layout);
		}
	}
	
	function dash()
	{
		
	}
	
	function showsettings()
	{
		$data = array(
			'sitetitle' => Cache::get('site-title'),
			'sitename' => Cache::get('site-name'),
			'postspage' => Cache::get('posts-page'),
			'dateformat' => Cache::get('date-format')
		);
		
		$this->layout->content = View::make('admin.settings', $data);
	}
	
	function savesettings()
	{
		$rules = array(
			'site-title' => 'max:13',
			'site-name' => 'max:13',
			'posts-page' => 'integer|required',
			'date-format' => 'required'
		);
		
		$v = Validator::make(Input::all(), $rules);
		
		if($v->fails())
			return Redirect::to(route('admin.settings'))->withErrors($v)->withInput(Input::all());
		
		Cache::forever('site-title', Input::get('site-title'));
		Cache::forever('site-name', Input::get('site-name'));
		Cache::forever('posts-page', Input::get('posts-page'));
		Cache::forever('date-format', Input::get('date-format'));
		
		return Redirect::to(route('admin.settings'))->with('success', 'Website settings have been saved!');
	}
}