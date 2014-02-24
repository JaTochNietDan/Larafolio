<?php

class Download extends Eloquent
{
    protected $table = 'downloads';
    protected $fillable = array('ip');
    
    public function file()
    {
        return $this->belongsTo('Upload', 'upload_id');
    }
}
