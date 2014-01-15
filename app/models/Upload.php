<?php

class Upload extends Eloquent
{
    public function release()
    {
        $this->belongsTo('Release');
    }
	
	public function delete()
	{
		// Delete file here
		
		return parent::delete();
	}
	
    protected $table = 'uploads';
}
