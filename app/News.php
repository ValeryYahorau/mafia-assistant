<?php namespace App;
use Illuminate\Database\Eloquent\Model;
use File;

class News extends Model {

	protected $guarded = [];

    public function delete()
    {
        return parent::delete();
    }  
}