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
			
		});
	}
	
    public function category()
    {
        return $this->belongsTo('Category');
    }
    
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'posts';
}