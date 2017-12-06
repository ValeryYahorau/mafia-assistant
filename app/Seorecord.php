<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use File;

class Seorecord extends Model {

    protected $guarded = [];
	public $timestamps = false;

    public function delete()
    {
        return parent::delete();
    }  
}