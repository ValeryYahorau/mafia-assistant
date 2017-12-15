<?php

namespace App\Http\Controllers;

use Log;
use Image;
use File;
use App\Game;
use App\Player;
use Redirect;
use App\Http\Requests\GameRequest;
use App\Http\Requests;
use Illuminate\Http\Request;

class GameController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create(Request $request, $type)
    {
        if ($request->user()->is_admin()) {
            $players = Player::orderBy('name_ru', 'asc')->get();
            return view('admin.game.create_step1')->withType($type)->withPlayers($players);
        }
    }

    public function saveStep1(GameRequest $request)
    {
        if ($request->user()->is_admin()) {
            $game = new Game();
            $game->type = $request->get('type');
            $game->user_id = $request->user()->id;

            /**
             * $event->title_ru = $request->get('player1');
             * $event->title_ru = $request->get('player2');
             * $event->title_ru = $request->get('player3');
             * $event->title_ru = $request->get('player4');
             * $event->title_ru = $request->get('player5');
             * $event->title_ru = $request->get('player6');
             * $event->title_ru = $request->get('player7');
             * $event->title_ru = $request->get('player8');
             * $event->title_ru = $request->get('player9');
             * $event->title_ru = $request->get('player10');
             **/
            $game->save();

            return redirect('/admin/games');
        }
    }

    public function delete(Request $request, $id)
    {
        if ($request->user()->is_admin()) {
            $game = Game::find($id);
            if ($game) {
                $game->delete();
                $data['message'] = 'Game was deleted successfully';
                return redirect('/admin/games')->with($data);
            } else {
                return redirect('/admin/games')->withErrors('There is no such game.');
            }
        }
    }

    public function alltmp(Request $request, $type)
    {
        if ($request->user()->is_admin()) {
            $games = Game::where('type', $type)->orderBy('created_at', 'desc')->paginate(20);
            if ($type == "simple") {
                $label = "Обычные";
            } else {
                $label = "Рейтинговые";
            }
            return view('admin.game.all')->withGames($games)->withLabel($label)->withType($type);
        }
    }

    public function all(Request $request)
    {
        if ($request->user()->is_admin()) {
            $games = Game::orderBy('created_at', 'desc')->paginate(20);
            return view('admin.game.all')->withGames($games);
        }
    }
}
