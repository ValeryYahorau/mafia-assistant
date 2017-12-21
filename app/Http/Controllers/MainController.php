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
        $red_win_count = Game::where('result', "red_win")->count();
        $black_win_1_1_count = Game::where('result', "black_win_1_1")->count();
        $black_win_2_2_count = Game::where('result', "black_win_2_2")->count();
        $black_win_3_3_count = Game::where('result', "black_win_3_3")->count();
        $black_win_count = $black_win_1_1_count + $black_win_2_2_count + $black_win_3_3_count;

        return view('web.main')->withBlack_win_1_1_count($black_win_1_1_count)->withBlack_win_2_2_count($black_win_2_2_count)->withBlack_win_3_3_count($black_win_3_3_count)
            ->withBlack_win_count($black_win_count)->withRed_win_count($red_win_count);
    }


    public function rating()
    {
        $red_win_count = Game::where('result', "red_win")->count();
        $black_win_count = Game::whereIn('result', array("black_win_1_1", "black_win_2_2", "black_win_3_3"))->count();
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

        foreach ($ratingArray as $key => $player) {
            Log::info("%1 ".$player->player_id);
        }
        return view('web.rating')->withStats($ratingArray)->withHard_type($hard_type)->withK($k);
    }
    /*
public function clever()
{
    return view('web.clever');
}
public function contacts()
{
    return view('web.contacts');
}

public function events()
{
    $eventsLine = Event::whereDate('date','>=', Carbon::today())->where('line',true)->orderBy('date','asc')->get();
    $events = Event::whereDate('date','>=', Carbon::today())->orderBy('date','asc')->get();
    $pastevents = Event::whereDate('date','<', Carbon::today())->orderBy('date','desc')->paginate(1000);
    return view('web.events')->withLine($eventsLine)->withEvents($events)->withPastevents($pastevents);
}
 */
}
