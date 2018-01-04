<?php

namespace App\Http\Controllers;

use App;
use App\Game;
use App\Gameplayer;
use App\Player;
use App\Model\PlayerStat;
use Log;
use Session;
use App\Http\Requests;
use Illuminate\Http\Request;
use Redirect;
use LaravelLocalization;
use Carbon\Carbon;

class MainController extends Controller
{

    public function index()
    {
        /* CHARTS */
        $red_win_count = Game::where('result', "red_win")->count();
        $black_win_1_1_count = Game::where('result', "black_win_1_1")->count();
        $black_win_2_2_count = Game::where('result', "black_win_2_2")->count();
        $black_win_3_3_count = Game::where('result', "black_win_3_3")->count();
        $black_win_count = $black_win_1_1_count + $black_win_2_2_count + $black_win_3_3_count;

        /* INFO */
        $r_red_win_count = Game::where('result', "red_win")->where('type', "rating")->count();
        $r_black_win_count = Game::whereIn('result', array("black_win_1_1", "black_win_2_2", "black_win_3_3"))->where('type', "rating")->count();

        $s_red_win_count = Game::where('result', "red_win")->where('type', "simple")->count();
        $s_black_win_count = Game::whereIn('result', array("black_win_1_1", "black_win_2_2", "black_win_3_3"))->where('type', "simple")->count();

        $s_player_count = Player::where('rating', false)->count() - 1;
        $r_player_count = Player::where('rating', true)->count() - 1;


        return view('web.main')->withBlack_win_1_1_count($black_win_1_1_count)->withBlack_win_2_2_count($black_win_2_2_count)->withBlack_win_3_3_count($black_win_3_3_count)
            ->withBlack_win_count($black_win_count)->withRed_win_count($red_win_count)
            ->withR_red_win_count($r_red_win_count)->withR_black_win_count($r_black_win_count)
            ->withS_red_win_count($s_red_win_count)->withS_black_win_count($s_black_win_count)
            ->withS_player_count($s_player_count)->withR_player_count($r_player_count);


    }

    public function rating($type)
    {
        if ($type == 'rating') {
            $players = Player::where('rating', true)->get();
        } else {
            $players = Player::get();
        }
        $playersMap = array();
        foreach ($players as $key => $p) {
            $playersMap[$p->id] = $p;
        }

        if ($type == 'rating') {
            $gamePlayers = Gameplayer::where('game_type', 'rating')->where('result', '<>', 'none')->whereNotIn('player_id', [23, 24])->get();
        } else {
            $gamePlayers = Gameplayer::where('game_type', 'simple')->where('result', '<>', 'none')->whereNotIn('player_id', [23, 24])->get();
        }
        $gamePlayersMap = array();
        foreach ($gamePlayers as $key => $gp) {
            $player_id = $gp->player_id;
            if (array_key_exists($player_id, $gamePlayersMap)) {
                $playerStat = $gamePlayersMap[$player_id];
                $playerStat->player_id = $player_id;
                $playerStat->player = $playersMap[$player_id];
                $playerStat->additional_points = $playerStat->additional_points + $gp->additional_points;

                if ($gp->result == "win") {
                    $playerStat->win_count = $playerStat->win_count + 1;
                } elseif ($gp->result == "lose") {
                    $playerStat->lose_count = $playerStat->lose_count + 1;
                }

                $playerStat->points = $playerStat->points + $gp->points;

                $gamePlayersMap[$player_id] = $playerStat;
            } else {
                $playerStat = new PlayerStat();
                $playerStat->player_id = $player_id;
                $playerStat->player = $playersMap[$player_id];
                $playerStat->additional_points = $gp->additional_points;

                if ($gp->result == "win") {
                    $playerStat->win_count = 1;
                } elseif ($gp->result == "lose") {
                    $playerStat->lose_count = 1;
                }
                $playerStat->points = $gp->points;
                $gamePlayersMap[$player_id] = $playerStat;
            }
        }

        $ratingArray = array();

        foreach ($gamePlayersMap as $key => $ps) {
            $total_points = $ps->points + $ps->additional_points;
            $ps->total_game_count = $ps->win_count + $ps->lose_count;
            $pk = $total_points / $ps->total_game_count;
            $ps->rating = $pk * $ps->win_count;
            array_push($ratingArray, $ps);
        }

        usort($ratingArray, function ($a, $b) {
            $result = 0;
            if ($a->rating > $b->rating) {
                $result = -1;
            } elseif ($a->rating < $b->rating) {
                $result = 1;
            }
            return $result;
        });
        return view('web.rating')->withStats($ratingArray)->withType($type);
    }

    public function players(Request $request, $type)
    {
        if ($type == 'all') {
            $players = Player::orderBy('name_ru', 'asc')->whereNotIn('id', [23, 24])->get();
        } elseif ($type == 'rating') {
            $players = Player::where('rating', true)->whereNotIn('id', [23, 24])->orderBy('name_ru', 'asc')->get();
        } else {
            $players = Player::where('rating', false)->whereNotIn('id', [23, 24])->orderBy('name_ru', 'asc')->get();
        }
        return view('web.players')->withPlayers($players)->withType($type);
    }

    public function player(Request $request, $id)
    {
        $player = Player::where('id', $id)->first();
        if ($player->rating) {
            $gamePlayers = Gameplayer::where('game_type', 'rating')->where('result', '<>', 'none')->where('player_id', $id)->get();
        } else {
            $gamePlayers = Gameplayer::where('game_type', 'simple')->where('result', '<>', 'none')->where('player_id', $id)->get();
        }
        $playerStat = new PlayerStat();
        foreach ($gamePlayers as $key => $gp) {
            $playerStat->total_game_count = $playerStat->total_game_count + 1;
            if ($gp->result == "win") {
                $playerStat->win_count = $playerStat->win_count + 1;
                if ($gp->role == "red") {
                    $playerStat->red_game_count = $playerStat->red_game_count + 1;
                    $playerStat->red_win_count = $playerStat->red_win_count + 1;
                } elseif ($gp->role == "sheriff") {
                    $playerStat->sheriff_game_count = $playerStat->sheriff_game_count + 1;
                    $playerStat->sheriff_win_count = $playerStat->sheriff_win_count + 1;
                } elseif ($gp->role == "black") {
                    $playerStat->black_game_count = $playerStat->black_game_count + 1;
                    $playerStat->black_win_count = $playerStat->black_win_count + 1;
                } elseif ($gp->role == "don") {
                    $playerStat->don_game_count = $playerStat->don_game_count + 1;
                    $playerStat->don_win_count = $playerStat->don_win_count + 1;
                }
            } elseif ($gp->result == "lose") {
                $playerStat->lose_count = $playerStat->lose_count + 1;
                if ($gp->role == "red") {
                    $playerStat->red_game_count = $playerStat->red_game_count + 1;
                } elseif ($gp->role == "sheriff") {
                    $playerStat->sheriff_game_count = $playerStat->sheriff_game_count + 1;
                } elseif ($gp->role == "black") {
                    $playerStat->black_game_count = $playerStat->black_game_count + 1;
                } elseif ($gp->role == "don") {
                    $playerStat->don_game_count = $playerStat->don_game_count + 1;
                }
            }
        }
        if ($playerStat->sheriff_game_count != 0) {
            $playerStat->sheriff_win_rate = $playerStat->sheriff_win_count / $playerStat->sheriff_game_count * 100;
        }
        if ($playerStat->red_game_count != 0) {
            $playerStat->red_win_rate = $playerStat->red_win_count / $playerStat->red_game_count * 100;
        }
        if ($playerStat->don_game_count != 0) {
            $playerStat->don_win_rate = $playerStat->don_win_count / $playerStat->don_game_count * 100;
        }
        if ($playerStat->black_game_count != 0) {
            $playerStat->black_win_rate = $playerStat->black_win_count / $playerStat->black_game_count * 100;
        }
        if ($playerStat->total_game_count != 0) {
            $playerStat->win_rate = $playerStat->win_count / $playerStat->total_game_count * 100;
        }
        if ($playerStat->black_game_count != 0 || $playerStat->don_game_count != 0) {
            $playerStat->total_black_win_rate = ($playerStat->don_win_count + $playerStat->black_win_count) / ($playerStat->black_game_count + $playerStat->don_game_count) * 100;
        }
        if ($playerStat->sheriff_game_count != 0 || $playerStat->red_game_count != 0) {
            $playerStat->total_red_win_rate = ($playerStat->sheriff_win_count + $playerStat->red_win_count) / ($playerStat->sheriff_game_count + $playerStat->red_game_count) * 100;
        }
        return view('web.player')->withPlayer($player)->withStat($playerStat);
    }


    public function ratingOld($type)
    {
        /*TODO*/
        $red_win_count = Game::where('result', "red_win")->where('type', "rating")->count();
        $black_win_count = Game::whereIn('result', array("black_win_1_1", "black_win_2_2", "black_win_3_3"))->where('type', "rating")->count();
        $total_games = $red_win_count + $black_win_count;
        $hard_type = "";
        $k = 1;

        if ($red_win_count > $black_win_count) {
            $hard_type = "black";
            $k = ($total_games / 2 - $black_win_count) / ($total_games / 2) + 1;
        } elseif ($red_win_count < $black_win_count) {
            $hard_type = "red";
            $k = ($total_games / 2 - $red_win_count) / ($total_games / 2) + 1;
        } else {
            $hard_type = "none";
        }

        $players = Player::where('rating', true)->get();
        $playersMap = array();
        foreach ($players as $key => $p) {
            $playersMap[$p->id] = $p;
        }

        $gamePlayers = Gameplayer::where('game_type', 'rating')->get();
        $gamePlayersMap = array();
        foreach ($gamePlayers as $key => $gp) {
            $player_id = $gp->player_id;
            if (array_key_exists($player_id, $gamePlayersMap)) {
                $playerStat = $gamePlayersMap[$player_id];
                $playerStat->player_id = $player_id;
                $playerStat->player = $playersMap[$player_id];
                $playerStat->additional_points = $playerStat->additional_points + $gp->additional_points;

                if ($gp->result == "win") {
                    $playerStat->win_count = $playerStat->win_count + 1;
                } elseif ($gp->result == "lose") {
                    $playerStat->lose_count = $playerStat->lose_count + 1;
                }

                if ($hard_type == "black" && $gp->result == "win" &&
                    ($gp->gameresult == "black_win_1_1" || $gp->gameresult == "black_win_2_2" || $gp->gameresult == "black_win_3_3")) {
                    $playerStat->points = $playerStat->points + $k * $gp->points;
                } elseif ($hard_type == "red" && $gp->result == "win" && $gp->gameresult == "red_win") {
                    $playerStat->points = $playerStat->points + $k * $gp->points;
                } else {
                    $playerStat->points = $playerStat->points + $gp->points;
                }

                $gamePlayersMap[$player_id] = $playerStat;
            } else {
                $playerStat = new PlayerStat();
                $playerStat->player_id = $player_id;
                $playerStat->player = $playersMap[$player_id];
                $playerStat->additional_points = $gp->additional_points;

                if ($gp->result == "win") {
                    $playerStat->win_count = 1;
                } elseif ($gp->result == "lose") {
                    $playerStat->lose_count = 1;
                }

                if ($hard_type == "black" && $gp->result == "win" &&
                    ($gp->gameresult == "black_win_1_1" || $gp->gameresult == "black_win_2_2" || $gp->gameresult == "black_win_3_3")) {
                    $playerStat->points = $k * $gp->points;
                } elseif ($hard_type == "red" && $gp->result == "win" && $gp->gameresult == "red_win") {
                    $playerStat->points = $k * $gp->points;
                } else {
                    $playerStat->points = $gp->points;
                }

                $gamePlayersMap[$player_id] = $playerStat;
            }
        }

        $ratingArray = array();

        foreach ($gamePlayersMap as $key => $ps) {
            $total_points = $ps->points + $ps->additional_points;
            $ps->total_game_count = $ps->win_count + $ps->lose_count;
            $pk = $total_points / $ps->total_game_count;
            $ps->rating = $pk * $ps->win_count;
            array_push($ratingArray, $ps);
        }

        usort($ratingArray, function ($a, $b) {
            $result = 0;
            if ($a->rating > $b->rating) {
                $result = -1;
            } elseif ($a->rating < $b->rating) {
                $result = 1;
            }
            return $result;
        });

        $ids = Gameplayer::where('game_type', "rating")->groupBy('player_id')->pluck('player_id');
        $players0 = Player::where('rating', true)->whereNotIn('id', $ids)->get();

        foreach ($players0 as $key => $p0) {
            $ps = new PlayerStat();
            $ps->player_id = $p0->id;
            $ps->player = $p0;
            $ps->additional_points = 0;
            $ps->total_game_count = 0;
            $ps->rating = 0;
            $ps->win_count = 0;
            $ps->lose_count = 0;
            array_push($ratingArray, $ps);
        }
        return view('web.rating')->withStats($ratingArray)->withHard_type($hard_type)->withK($k);
    }
}
