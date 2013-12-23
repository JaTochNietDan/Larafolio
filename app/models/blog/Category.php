<?php

class Category extends Eloquent
{
    public function posts()
    {
        return $this->hasMany('Post');
    }
    
    protected $table = 'categories';
}
