<?php

namespace App\Http\Controllers;

use Log;
use Image;
use File;
use App\Game;
use Redirect;
use App\Http\Requests;
use App\Http\Requests\EventRequest;
use Illuminate\Http\Request;

class GameController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /*

    public function create(Request $request)
    {
        if ($request->user()->is_admin()) {
            return view('admin.event.create');
        }
    }

    public function save(EventRequest $request)
    {
        if ($request->user()->is_admin()) {
            $event = new Event();
            $event->title_en = $request->get('title_en');
            $event->title_ru = $request->get('title_ru');
            $event->short_title_en = $request->get('short_title_en');
            $event->short_title_ru = $request->get('short_title_ru');
            $event->short_desc_en = $request->get('short_desc_en');
            $event->short_desc_ru = $request->get('short_desc_ru');
            $event->body_en = $request->get('body_en');
            $event->body_ru = $request->get('body_ru');
            $event->button = $request->get('button');
            if ($request->get('line') == "on") {
                $event->line = true;
            } else {
                $event->line = false;
            }

            $event->date = $request->get('date');
            $event->slug = str_slug($event->date . '-' . $event->short_title_en);

            $duplicate = Event::where('date', $request->get('date'))->first();
            if ($duplicate) {
                return redirect('admin/create-event/')->withErrors('This date is already busy.')->withInput();
            }

            if ($request->hasFile('image')) {
                $image = new Image();
                $image = $request->file('image');
                $imageName = 'event' . $event->date . '.' . $image->getClientOriginalExtension();
                $image->move(base_path() . '/content/img/events/', $imageName);

                $event->img_path = '/content/img/events/' . $imageName;
            }
            $event->save();

            $data['message'] = 'Event was created successfully.';
            return redirect('/admin/events')->with($data);
        }
    }

    public function edit(Request $request, $id)
    {
        if ($request->user()->is_admin()) {
            $event = Event::where('id', $id)->first();
            if ($event) {
                return view('admin.event.edit')->withEvent($event);
            } else {
                return redirect('/admin/events')->withErrors('There is no susch event.');
            }
        }
    }

    public function update(EventRequest $request)
    {
        if ($request->user()->is_admin()) {
            $event_id = $request->input('event_id');
            $event = Event::find($event_id);
            if ($event) {
                $event->title_en = $request->get('title_en');
                $event->title_ru = $request->get('title_ru');
                $event->short_title_en = $request->get('short_title_en');
                $event->short_title_ru = $request->get('short_title_ru');
                $event->short_desc_en = $request->get('short_desc_en');
                $event->short_desc_ru = $request->get('short_desc_ru');
                $event->body_en = $request->get('body_en');
                $event->body_ru = $request->get('body_ru');
                $event->date = $request->get('date');
                $event->button = $request->get('button');
                if ($request->get('line') == "on") {
                    $event->line = true;
                } else {
                    $event->line = false;
                }
                $event->slug = str_slug($event->date . '-' . $event->short_title_en);

                $duplicate = Event::where('date', $request->get('date'))->first();
                if ($duplicate) {
                    if ($duplicate->id != $event_id) {
                        return redirect('admin/edit-event/' . $event_id)->withErrors('This date is already busy.');
                    }
                }

                if ($request->hasFile('image')) {
                    File::delete(public_path() . $event->img_path);
                    $image = new Image();
                    $image = $request->file('image');
                    $imageName = 'event' . $event->date . '.' . $image->getClientOriginalExtension();
                    $image->move(base_path() . '/content/img/events/', $imageName);
                    $event->img_path = '/content/img/events/' . $imageName;
                }
                $event->save();

                $data['message'] = 'Event was updated successfully.';
                return redirect('/admin/events')->with($data);
            }
        }
    }

    public function delete(Request $request, $id)
    {
        if ($request->user()->is_admin()) {
            $event = Event::find($id);
            if ($event) {
                $event->delete();
                $data['message'] = 'Event deleted successfully';
                return redirect('/admin/events')->with($data);
            } else {
                return redirect('/admin/events')->withErrors('There is no susch event.');
            }
        }
    }
*/
    public function all(Request $request, $type)
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
}
