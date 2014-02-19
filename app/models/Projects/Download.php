<?php

class Download extends Eloquent
{
    protected $table = 'downloads';
    protected $fillable = array('ip');
    
    public function release()
    {
        return $this->belongsTo('Release');
    }
}
