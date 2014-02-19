<?php

class Release extends Eloquent
{	
    public function project()
    {
        return $this->belongsTo('Project');
    }
    
    public function files()
    {
        return $this->hasMany('Upload');
    }
	
	public function downloads()
	{
		return $this->hasMany('Download');
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