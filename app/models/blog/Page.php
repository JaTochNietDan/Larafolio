<?php

class Page extends Eloquent
{
    public static function boot()
	{
		parent::boot();
		
		Page::creating(function($p)
		{
			$p->link = Str::slug($p->title);
		});
    }
    
    protected $table = 'pages';
    
    protected $fillable = array('title', 'content');
    
    public static function store_rules()
    {
        return array(
            'title' => 'required|min:2|max:20|unique:pages'
        );
    }
    
    public static function update_rules($id)
    {
        return array(
            'title' => 'required|min:2|max:20|unique:pages,title,'.$id
        );
    }
}
