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
	
	public function download_count()
	{
		number_format(
			$this->join('downloads', 'downloads.upload_id', '=', 'uploads.id')
			->where('uploads.id', '=', $this->id)
			->count('downloads.id'));
		
		$queries = DB::getQueryLog();
		
		return $queries;
	}
	
    protected $table = 'uploads';
}
