<?php

namespace App\Http\Controllers;

use App;
use Log;
use Session;
use App\Http\Requests;
use Illuminate\Http\Request;
use Redirect;
use LaravelLocalization;
use Carbon\Carbon;
use App\Event;
use App\Photoreport;
use App\News;

class MainController extends Controller
{

    public function index()
    {
        $eventsLine = Event::whereDate('date','>=', Carbon::yesterday())->where('line',true)->orderBy('date','asc')->get();  
        return view('web.main')->withLine($eventsLine);
    }

    public function about()
    {
        return view('web.about');
    }
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

    public function event(Request $request,$slug)
    {
        $event = Event::where('slug',$slug)->first();
        return view('web.event')->withEvent($event);
    }  

    public function photoreports(Request $request)
    {
        $photoreports = Photoreport::orderBy('date','desc')->get();       
        return view('web.photoreports')->withPhotoreports($photoreports);
    }

    public function singlePhotoreport(Request $request,$slug)
    {
        $photoreport = Photoreport::where('slug',$slug)->first();     
        return view('web.photoreport')->withPhotoreport($photoreport);
    }

    public function news()
    {
        $news = News::orderBy('date','desc')->paginate(1000);          
        return view('web.news')->withNews($news);
    }

    public function singleNews(Request $request,$slug)
    {
        $news = News::where('slug',$slug)->first();
        return view('web.singlenews')->withNews($news);
    }      
}
