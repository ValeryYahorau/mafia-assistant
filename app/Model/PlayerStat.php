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

    public $win_rate = 0;

    public $sheriff_game_count = 0;
    public $sheriff_win_count = 0;
    public $sheriff_win_rate = 0;

    public $red_game_count = 0;
    public $red_win_count = 0;
    public $red_win_rate = 0;

    public $don_game_count = 0;
    public $don_win_count = 0;
    public $don_win_rate = 0;

    public $black_game_count = 0;
    public $black_win_count = 0;
    public $black_win_rate = 0;

    public $total_black_win_rate = 0;
    public $total_red_win_rate = 0;
}