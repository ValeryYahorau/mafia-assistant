<?php namespace App;
use Illuminate\Database\Eloquent\Model;
use File;

class Event extends Model {

	protected $guarded = [];

    public function delete()
    {
    	File::delete(base_path().$this->img_path);
        return parent::delete();
    }  
}