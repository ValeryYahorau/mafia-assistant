<?php

namespace App\Http\Controllers;

use App;
use Log;
use Session;
use App\Item;
use App\Category;
use App\News;
use App\Http\Requests\FormRequest;
use App\Property;
use App\Http\Requests;
use Illuminate\Http\Request;
use Redirect;
use LaravelLocalization;
use Mail;

class MainController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return Response
     */
    public function index()
    {
        return view('web.home');
    }    

    public function intro()
    {
        return view('web.intro');
    }    


    public function contacts()
    {
        $address = Property::where('key','address')->first();
        $email = Property::where('key','email')->first();
        $phone1 = Property::where('key','phone1')->first();
        $phone2 = Property::where('key','phone2')->first();
        $phone3 = Property::where('key','phone3')->first();  
        return view('web.contacts')->withAddress($address)->withPhone1($phone1)->withPhone2($phone2)->withPhone3($phone3)->withEmail($email);
    } 

    public function category($title)
    {
        $category = Category::where('title',$title)->first();
        $items = Item::where('category_id',$category->id)->orderBy('position','asc')->get();     
        return view('web.category')->withItems($items)->withCategory($category);
    }  

    public function item($slug)
    {
        $item = Item::where('slug',$slug)->first();  
        return view('web.item')->withItem($item);
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
