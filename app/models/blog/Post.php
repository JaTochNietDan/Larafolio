<?php

class Post extends Eloquent
{
	public static function boot()
	{
		parent::boot();
		
		Post::creating(function($p)
		{
			$p->link = strtolower(str_replace(' ', '-', $p->title));
		});
		
		Post::saving(function($p)
		{
			$p->excerpt = $p->content;
		});
	}
	
    public function category()
    {
        return $this->belongsTo('Category');
    }
    
	protected $table = 'posts';
	
	protected $fillable = array('title', 'published', 'content', 'category_id');
}