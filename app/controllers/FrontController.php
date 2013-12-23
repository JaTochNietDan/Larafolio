<?php

class FrontController extends Controller
{
	protected $layout = 'layouts.front';
	
	protected function setupLayout()
	{
		if (!is_null($this->layout))
		{
			$this->layout = View::make($this->layout);
		}
	}
}