<?php

class Project extends Eloquent
{
	public static function boot()
	{
		parent::boot();
		
		Project::creating(function($p)
		{
			$p->link = strtolower(str_replace(' ', '-', $p->title));
		});
	}
	
    public function category()
    {
        return $this->belongsTo('Category');
    }
	
	public function releases()
	{
		return $this->hasMany('Release');
	}
    
	protected $table = 'projects';
	
	protected $fillable = array('title', 'description', 'category_id', 'excerpt');
	
	public static function update_rules($id)
	{
		return array(
			'title' => 'min:3|max:25|required|unique:projects,title,'.$id,
			'category_id' => 'required|exists:categories,id',
			'excerpt' => 'max:500'
		);
	}

	public static function store_rules()
	{
		return array(
			'title' => 'min:3|max:25|required|unique:projects',
			'category_id' => 'required|exists:categories,id',
			'excerpt' => 'max:500'
		);
	}
}