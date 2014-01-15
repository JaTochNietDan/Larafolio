<?php

class Release extends Eloquent
{	
    public function project()
    {
        return $this->belongsTo('Project');
    }
    
	protected $table = 'releases';
	
	protected $fillable = array('name', 'changelog', 'project_id');
    
    public static function store_rules()
    {
        return array(
            'name' => 'required|min:2|max:10'  
        );
    }
}