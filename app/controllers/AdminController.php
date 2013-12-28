<?php

class AdminController extends Controller
{
	protected $layout = 'admin.layouts.main';
	
	public function __construct()
	{
		$this->beforeFilter('csrf', array('on' => 'post'));
	}
	
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