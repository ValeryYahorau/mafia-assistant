<?php namespace App\Model;

class PlayerStat
{
    public $player_id;
    public $player;
    public $points;
    public $additional_points;
    public $win_count = 0;
    public $lose_count = 0;
    public $total_game_count = 0;
    public $rating = 0;
}