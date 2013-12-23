<?php

class Post extends Eloquent
{
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