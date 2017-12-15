<?php namespace App;
use Illuminate\Database\Eloquent\Model;
use File;

class Gameplayer extends Model {

	protected $guarded = [];
    public $timestamps = false;

    public function delete()
    {
        return parent::delete();
    }

    public function player()
    {
        return $this->belongsTo('App\Player','player_id');
    }

    public function game()
    {
        return $this->belongsTo('App\Game','game_id');
    }
}