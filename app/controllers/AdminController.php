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
		$downloads = Download::where('created_at', '>=', new DateTime('today'))->get();
		
		$countries = array();
		
		foreach($downloads as $d)
		{
			$location = GeoIP::getLocation($d->ip);
			
			if(!isset($countries[$location['country']]))
				$countries[$location['country']] = 1;
			else
				$countries[$location['country']]++;
		}
		
		arsort($countries);
		
		$this->layout->content = View::make('admin.dash', array('countries' => $countries));
	}
}