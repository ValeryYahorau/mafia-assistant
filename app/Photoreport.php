<?php namespace App;
use Illuminate\Database\Eloquent\Model;
use File;

class Photoreport extends Model {

	protected $guarded = [];

	public function photos()
	{
    	return $this->hasMany('App\Photo','photoreport_id');
  	}  

    public function delete()
    {
    	File::deleteDirectory(base_path() . '/content/img/photoreports/'. $this->date);
        $this->photos()->delete();
        File::delete(base_path().$this->img_path);
        return parent::delete();
    }
}