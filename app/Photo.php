<?php namespace App;
use Illuminate\Database\Eloquent\Model;
use File;

class Photo extends Model {

	protected $guarded = [];

	public function photoreport()
	{
		return $this->belongsTo('App\Photoreport','photoreport_id');
	}  

    public function delete()
    {
        File::delete(base_path().$this->img_l_path);
        File::delete(base_path().$this->img_s_path);
        return parent::delete();
    }    
}