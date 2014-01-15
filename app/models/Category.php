<?php

class Category extends Eloquent
{
    public static function boot()
    {
        parent::boot();
		
		Category::creating(function($c)
		{
			$c->link = strtolower(str_replace(' ', '-', $c->title));
		});
    }
	
	public function projects()
	{
		return $this->hasMany('Project');
	}
    
    public function posts()
    {
        return $this->hasMany('Post');
    }
	
	public static function update_rules()
	{
		return array(
			'title' => 'required|min:2|max:20|unique:categories'
		);
	}
	
	public function delete()
	{
		if($this->projects)
			Project::where('category_id', '=', $this->id)->update(array('category_id' => 0));
		else
			Post::where('category_id', '=', $this->id)->update(array('category_id' => 0));
		
		return parent::delete();
	}
    
	protected $fillable = array('title', 'projects');
	
    protected $table = 'categories';
}
