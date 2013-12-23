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
    
    public function posts()
    {
        return $this->hasMany('Post');
    }
    
    protected $table = 'categories';
}
