<?php

class FrontController extends Controller
{
	protected $layout = 'front.layout';
	
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
}