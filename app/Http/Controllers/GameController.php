<?php

namespace App\Http\Controllers;

use Log;
use App\Game;
use App\Player;
use App\Gameplayer;
use App\Property;
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
            return view('admin.game.step1')->withPlayers($players);
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

    public function saveStep2(Request $request)
    {
        if ($request->user()->is_admin()) {
            $game_id = $request->input('game_id');
            $game = Game::where('id', $game_id)->first();
            if ($game) {
                $game->status = "in_progress";
                $game->save();
                return redirect('/admin/game/' . $game->id);
            } else {
                return redirect('/admin/players')->withErrors('There is no such game.');
            }
        }
    }

    public function saveStep3(Request $request)
    {
        if ($request->user()->is_admin()) {
            $game_id = $request->input('game_id');
            $game = Game::where('id', $game_id)->first();

            $result = $request->get('result');
            $this->updateGamePlayer($result, $game->type, $request->get('additional_points_1'), $game->id, 1);
            $this->updateGamePlayer($result, $game->type, $request->get('additional_points_2'), $game->id, 2);
            $this->updateGamePlayer($result, $game->type, $request->get('additional_points_3'), $game->id, 3);
            $this->updateGamePlayer($result, $game->type, $request->get('additional_points_4'), $game->id, 4);
            $this->updateGamePlayer($result, $game->type, $request->get('additional_points_5'), $game->id, 5);
            $this->updateGamePlayer($result, $game->type, $request->get('additional_points_6'), $game->id, 6);
            $this->updateGamePlayer($result, $game->type, $request->get('additional_points_7'), $game->id, 7);
            $this->updateGamePlayer($result, $game->type, $request->get('additional_points_8'), $game->id, 8);
            $this->updateGamePlayer($result, $game->type, $request->get('additional_points_9'), $game->id, 9);
            $this->updateGamePlayer($result, $game->type, $request->get('additional_points_10'), $game->id, 10);

            $game->status = "ended";
            $game->result = $result;
            $game->save();

            return redirect('/admin/game/' . $game->id);
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

    public function view(Request $request, $id)
    {
        if ($request->user()->is_admin()) {
            $game = Game::find($id);
            if ($game) {
                if ($game->status == "preparation") {
                    $gameplayers = Gameplayer::where('game_id', $game->id)->orderBy('position', 'asc')->get();
                    return view('admin.game.step2')->withGame($game)->withGameplayers($gameplayers);
                }
                if ($game->status == "in_progress") {
                    $gameplayers = Gameplayer::where('game_id', $game->id)->orderBy('position', 'asc')->get();
                    return view('admin.game.step3')->withGame($game)->withGameplayers($gameplayers);
                }
                if ($game->status == "ended") {
                    $gameplayers = Gameplayer::where('game_id', $game->id)->orderBy('position', 'asc')->get();
                    return view('admin.game.step4')->withGame($game)->withGameplayers($gameplayers);
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

    public function createProtocol(Request $request)
    {
        if ($request->user()->is_admin()) {
            $players = Player::orderBy('name_ru', 'asc')->get();
            return view('admin.game.step1protocol')->withPlayers($players);
        }
    }

    public function saveProtocol(Request $request)
    {
        if ($request->user()->is_admin()) {
            $game = new Game();
            $game->user_id = $request->user()->id;
            $arrayIds = array($request->get('player1'), $request->get('player2'), $request->get('player3'), $request->get('player4'),
                $request->get('player5'), $request->get('player6'), $request->get('player7'), $request->get('player8'),
                $request->get('player9'), $request->get('player10'));

            $count = Player::whereIn('id', $arrayIds)->where('rating', false)->count();
            if ($count == 0) {
                $game->type = "rating";
            }
            $result = $request->get('result');
            $game->status = "ended";
            $game->result = $result;
            $game->save();

            $this->saveGamePlayerProtocol($game->id, $game->type, $result, $request->get('player1'), $request->get('additional_points_1'), $request->get('role_1'), 1);
            $this->saveGamePlayerProtocol($game->id, $game->type, $result, $request->get('player2'), $request->get('additional_points_2'), $request->get('role_2'), 2);
            $this->saveGamePlayerProtocol($game->id, $game->type, $result, $request->get('player3'), $request->get('additional_points_3'), $request->get('role_3'), 3);
            $this->saveGamePlayerProtocol($game->id, $game->type, $result, $request->get('player4'), $request->get('additional_points_4'), $request->get('role_4'), 4);
            $this->saveGamePlayerProtocol($game->id, $game->type, $result, $request->get('player5'), $request->get('additional_points_5'), $request->get('role_5'), 5);
            $this->saveGamePlayerProtocol($game->id, $game->type, $result, $request->get('player6'), $request->get('additional_points_6'), $request->get('role_6'), 6);
            $this->saveGamePlayerProtocol($game->id, $game->type, $result, $request->get('player7'), $request->get('additional_points_7'), $request->get('role_7'), 7);
            $this->saveGamePlayerProtocol($game->id, $game->type, $result, $request->get('player8'), $request->get('additional_points_8'), $request->get('role_8'), 8);
            $this->saveGamePlayerProtocol($game->id, $game->type, $result, $request->get('player9'), $request->get('additional_points_9'), $request->get('role_9'), 9);
            $this->saveGamePlayerProtocol($game->id, $game->type, $result, $request->get('player10'), $request->get('additional_points_10'), $request->get('role_10'), 10);

            $data['message'] = 'Result was saved';
            return redirect('/admin/games')->with($data);
        }
    }

    /****************************/
    /* UTILS */
    /****************************/
    private function saveGamePlayer($role, $player_id, $game_id, $position)
    {
        $gamePlayer = new Gameplayer();
        $gamePlayer->role = $role;
        $gamePlayer->player_id = $player_id;
        $gamePlayer->game_id = $game_id;
        $gamePlayer->position = $position;
        $gamePlayer->save();
    }

    private function updateGamePlayer($result, $type, $additional_points, $game_id, $position)
    {
        $gamePlayer = Gameplayer::where('game_id', $game_id)->where('position', $position)->first();
        if ($result == "red_win" && ($gamePlayer->role == "red" || $gamePlayer->role == "sheriff")) {
            $gamePlayer->points = 2;
            $gamePlayer->result = "win";

        } else if (($result == "black_win_1_1" || $result == "black_win_2_2" || $result == "black_win_3_3")
            && ($gamePlayer->role == "black" || $gamePlayer->role == "don")) {
            $gamePlayer->points = 2;
            $gamePlayer->result = "win";
        } else if ($result == "draw") {
            $gamePlayer->points = 0;
            $gamePlayer->result = "draw";
        } else {
            $gamePlayer->points = 0;
            $gamePlayer->result = "lose";
        }
        $gamePlayer->game_result = $result;
        $gamePlayer->game_type = $type;
        $gamePlayer->additional_points = $additional_points;
        $gamePlayer->save();

        $player = Player::where('id', $gamePlayer->player_id)->first();
        if (!$player->rating) {
            $player->games_count = $player->games_count + 1;
            if ($player->games_count >= Property::where('key', 'rating_games_min')->first()->value) {
                $player->rating = true;
            }
            $player->save();
        }
    }

    private function saveGamePlayerProtocol($game_id, $type, $result, $player_id, $additional_points, $role, $position)
    {
        $gamePlayer = new Gameplayer();
        $gamePlayer->role = $role;
        $gamePlayer->player_id = $player_id;
        $gamePlayer->game_id = $game_id;
        $gamePlayer->position = $position;

        if ($result == "red_win" && ($gamePlayer->role == "red" || $gamePlayer->role == "sheriff")) {
            $gamePlayer->points = 2;
            $gamePlayer->result = "win";

        } else if (($result == "black_win_1_1" || $result == "black_win_2_2" || $result == "black_win_3_3")
            && ($gamePlayer->role == "black" || $gamePlayer->role == "don")) {
            $gamePlayer->points = 2;
            $gamePlayer->result = "win";
        } else if ($result == "draw") {
            $gamePlayer->points = 0;
            $gamePlayer->result = "draw";
        } else {
            $gamePlayer->points = 0;
            $gamePlayer->result = "lose";
        }
        $gamePlayer->game_result = $result;
        $gamePlayer->game_type = $type;
        $gamePlayer->additional_points = $additional_points;
        $gamePlayer->save();

        $player = Player::where('id', $gamePlayer->player_id)->first();
        if (!$player->rating) {
            $player->games_count = $player->games_count + 1;
            if ($player->games_count >= Property::where('key', 'rating_games_min')->first()->value) {
                $player->rating = true;
            }
            $player->save();
        }
    }
}
