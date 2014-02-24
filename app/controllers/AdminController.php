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
	
	function dash($time = 'today')
	{
		if(Input::has('time'))
			$time = Input::get('time');
		
		$downloads = Download::where('created_at', '>=', new DateTime($time))->get();
		
		$countries = array();
		$projects = array();
		
		foreach($downloads as $d)
		{
			$location = GeoIP::getLocation($d->ip);
			
			if(!isset($countries[$location['country']]))
				$countries[$location['country']] = 1;
			else
				$countries[$location['country']]++;
				
			if(!isset($projects[$d->file->release->project->title]))
				$projects[$d->file->release->project->title] = array('d' => $d, 'total' => 1);
			else
				$projects[$d->file->release->project->title]['total']++;
		}
		
		arsort($countries);
		
		usort($projects, function($a, $b)
		{
			return $b['total'] - $a['total'];
		});
		
		$this->layout->content = View::make('admin.dash', array('countries' => $countries, 'projects' => $projects));
	}
}