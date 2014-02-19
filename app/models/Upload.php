<?php

class Upload extends Eloquent
{
    public function release()
    {
        return $this->belongsTo('Release');
    }
	
	public function downloads()
    {
        return $this->hasMany('Download');
    }
	
	public function delete()
	{
		// Delete file here
		
		return parent::delete();
	}
	
    protected $table = 'uploads';
}
