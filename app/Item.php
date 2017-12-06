<?php namespace App;
use Illuminate\Database\Eloquent\Model;
use File;

class Item extends Model {

	protected $guarded = [];
	protected $table = 'item';

	public function photos()
	{
    	return $this->hasMany('App\Photo','item_id');
  	}  

    public function delete()
    {
    	File::delete(base_path().$this->img_path1);
    	File::delete(base_path().$this->img_path2);
        return parent::delete();
    }  
}