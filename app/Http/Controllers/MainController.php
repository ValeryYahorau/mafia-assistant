<?php

namespace App\Http\Controllers;

use App;
use App\Game;
use App\Gameplayer;
use App\Player;
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

        Log::info("#1 " . $red_win_count);
        Log::info("#1 " . $black_win_count);
        Log::info("#1 " . $total_games);
        Log::info("#1 " . $total_games/2);
        if ($red_win_count > $black_win_count) {
            $hard_type = "black";
            $k = ($total_games/2-$black_win_count)/($total_games/2) + 1;
        } elseif ($red_win_count < $black_win_count) {
            $hard_type = "red";
            $k = ($total_games/2-$red_win_count)/($total_games/2) + 1;
        } else {
            $hard_type = "none";
        }

        //TODO: check that rating games
        $gamePlayers = Gameplayer::where('points', 2)->orWhere('additional_points', '<>', 0)->get();

        foreach ($gamePlayers as $key=>$gp) {

        }

        return view('web.rating');
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
