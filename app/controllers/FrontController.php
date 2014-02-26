<?php

class FrontController extends Controller
{
	protected $layout = 'front.layouts.main';
	
	protected function setupLayout()
	{
		if (!is_null($this->layout))
		{
			$this->layout = View::make($this->layout);
		}
	}
	
	function login()
	{
		$this->layout->content = View::make('admin.login');
	}
	
	function search()
	{
		$this->layout->content = View::make('front.search');
	}
}