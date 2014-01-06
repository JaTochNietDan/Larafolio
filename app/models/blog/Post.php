<?php

class Post extends Eloquent
{
	public static function boot()
	{
		parent::boot();
		
		Post::creating(function($p)
		{
			$p->link = strtolower(str_replace(' ', '-', $p->title));
			
			$p->category->count += 1;
		});
		
		Post::saving(function($p)
		{
			if(empty($p->excerpt))
			{
				$p->excerpt = substr(strip_tags($p->content), 0, 500);
				
				$index = strrpos($p->excerpt, '.');
				
				if($index !== false)
					$p->excerpt = substr($p->excerpt, 0, $index + 1);
					
				$p->excerpt .= '...';
			}
			else
				$p->excerpt = strip_tags($p->excerpt);
		});
	}
	
    public function category()
    {
        return $this->belongsTo('Category');
    }
    
	protected $table = 'posts';
	
	protected $fillable = array('title', 'published', 'content', 'category_id', 'excerpt');
	
	public static function update_rules($id)
	{
		return array(
			'title' => 'min:3|max:50|required|unique:posts,title,'.$id,
			'category_id' => 'required|exists:categories,id',
			'published' => 'digitsbetween:0,1|integer',
			'excerpt' => 'max:500'
		);
	}

	public static function store_rules()
	{
		return array(
			'title' => 'min:3|max:50|required|unique:posts',
			'category_id' => 'required|exists:categories,id',
			'published' => 'digitsbetween:0,1|integer',
			'excerpt' => 'max:500'
		);
	}
}