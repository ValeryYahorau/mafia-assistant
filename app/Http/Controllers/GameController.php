<?php

namespace App\Http\Controllers;

use Log;
use App\Game;
use App\Player;
use App\Gameplayer;
use Redirect;
use App\Http\Requests\GameRequest;
use Illuminate\Http\Request;

class GameController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create(Request $request)
    {
        if ($request->user()->is_admin()) {
            $players = Player::orderBy('name_ru', 'asc')->get();
            return view('admin.game.create_step1')->withPlayers($players);
        }
    }

    public function saveStep1(GameRequest $request)
    {
        if ($request->user()->is_admin()) {
            $game = new Game();
            $game->user_id = $request->user()->id;
            $game->save();

            $roles = array('red', 'red', 'red', 'red', 'red', 'red', 'sheriff', 'black', 'black', 'don',);
            shuffle($roles);

            $this->saveGamePlayer(array_pop($roles), $request->get('player1'), $game->id, 1);
            $this->saveGamePlayer(array_pop($roles), $request->get('player2'), $game->id, 2);
            $this->saveGamePlayer(array_pop($roles), $request->get('player3'), $game->id, 3);
            $this->saveGamePlayer(array_pop($roles), $request->get('player4'), $game->id, 4);
            $this->saveGamePlayer(array_pop($roles), $request->get('player5'), $game->id, 5);
            $this->saveGamePlayer(array_pop($roles), $request->get('player6'), $game->id, 6);
            $this->saveGamePlayer(array_pop($roles), $request->get('player7'), $game->id, 7);
            $this->saveGamePlayer(array_pop($roles), $request->get('player8'), $game->id, 8);
            $this->saveGamePlayer(array_pop($roles), $request->get('player9'), $game->id, 9);
            $this->saveGamePlayer(array_pop($roles), $request->get('player10'), $game->id, 10);

            $arrayIds = array($request->get('player1'), $request->get('player2'), $request->get('player3'), $request->get('player4'),
                $request->get('player5'), $request->get('player6'), $request->get('player7'), $request->get('player8'),
                $request->get('player9'), $request->get('player10'));

            $count = Player::whereIn('id', $arrayIds)->where('rating', false)->count();
            if ($count == 0) {
                $game->type = "rating";
                $game->save();
            }

            return redirect('/admin/game/' . $game->id);
        }
    }

    private function saveGamePlayer($role, $player_id, $game_id, $position)
    {
        $gamePlayer = new Gameplayer();
        $gamePlayer->role = $role;
        $gamePlayer->player_id = $player_id;
        $gamePlayer->game_id = $game_id;
        $gamePlayer->position = $position;
        $gamePlayer->save();
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

    public function view(Request $request, $id)
    {
        if ($request->user()->is_admin()) {
            $game = Game::find($id);
            if ($game) {
                if ($game->status == "preparation") {
                    $gameplayers = Gameplayer::where('game_id', $game->id)->orderBy('position', 'asc')->get();
                    return view('admin.game.create_step2')->withGame($game)->withGameplayers($gameplayers);
                }
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
