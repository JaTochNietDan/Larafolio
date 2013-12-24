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
}