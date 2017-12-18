<?php

namespace App\Http\Controllers;

use Log;
use Image;
use File;
use App\PLayer;
use Redirect;
use App\Http\Requests\PlayerRequest;
use Illuminate\Http\Request;

class PlayerController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }


    public function create(Request $request)
    {
        if ($request->user()->is_admin()) {
            return view('admin.player.create');
        }
    }


    public function save(PlayerRequest $request)
    {
        if ($request->user()->is_admin()) {
            $player = new Player();
            $player->name_en = $request->get('name_en');
            $player->name_ru = $request->get('name_ru');
            $player->real_name = $request->get('real_name');
            $player->type = $request->get('type');
            $player->sex = $request->get('sex');
            if ($request->get('rating') == "on") {
                $player->rating =true;
            } else {
                $player->rating =false;
            }
            $player->info = $request->get('info');

            if ($request->hasFile('image')) {
                $image = new Image();
                $image = $request->file('image');
                $imageName = '$player' . $player->real_name . '.' . $image->getClientOriginalExtension();
                $image->move(base_path() . '/content/img/$players/', $imageName);
                $player->img_path = '/content/img/$players/' . $imageName;
            }
            $player->save();

            $data['message'] = 'Player was created successfully.';
            return redirect('/admin/players')->with($data);
        }
    }

    public function edit(Request $request, $id)
    {
        if ($request->user()->is_admin()) {
            $player = Player::where('id', $id)->first();
            if ($player) {
                return view('admin.player.edit')->withPlayer($player);
            } else {
                return redirect('/admin/players')->withErrors('There is no such player.');
            }
        }
    }

    public function update(PlayerRequest $request)
    {
        if ($request->user()->is_admin()) {
            $player_id = $request->input('player_id');
            $player = Player::find($player_id);
            if ($player) {
                $player->name_en = $request->get('name_en');
                $player->name_ru = $request->get('name_ru');
                $player->real_name = $request->get('real_name');
                $player->type = $request->get('type');
                $player->sex = $request->get('sex');
                if ($request->get('rating') == "on") {
                    $player->rating =true;
                } else {
                    $player->rating =false;
                }
                $player->info = $request->get('info');

                if ($request->hasFile('image')) {
                    File::delete(public_path() . $player->img_path);
                    $image = new Image();
                    $image = $request->file('image');
                    $imageName = '$player' . $player->real_name . '.' . $image->getClientOriginalExtension();
                    $image->move(base_path() . '/content/img/$players/', $imageName);
                    $player->img_path = '/content/img/$players/' . $imageName;
                }
                $player->save();

                $data['message'] = 'Player was updated successfully.';
                return redirect('/admin/players')->with($data);
            }
        }
    }

    public function delete(Request $request, $id)
    {
        if ($request->user()->is_admin()) {
            $player = Player::find($id);
            if ($player) {
                $player->delete();
                $data['message'] = 'Player was deleted successfully';
                return redirect('/admin/players')->with($data);
            } else {
                return redirect('/admin/players')->withErrors('There is no such player.');
            }
        }
    }

    public function all(Request $request)
    {
        if ($request->user()->is_admin()) {
            $players = Player::orderBy('name_ru', 'asc')->get();
            return view('admin.player.all')->withPlayers($players);
        }
    }
}
