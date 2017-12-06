<?php

namespace App\Http\Controllers;

use Log;
use Image;
use File;
use App\News;
use Redirect;
use App\Http\Requests;
use App\Http\Requests\NewsRequest;
use Illuminate\Http\Request;

class NewsController extends Controller
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

    public function create(Request $request)
    {
        if($request->user()->is_admin())
        {
            return view('admin.news.create');
        }
    }

    public function save(NewsRequest $request)
    {
        if($request->user()->is_admin()) {
            $news = new News();
            $news->title = $request->get('title');
            $news->short_desc = $request->get('short_desc');
            $news->body = $request->get('body');
            $news->date = $request->get('date');        
            $news->slug = str_slug($news->date .'-'. $news->title);
            
            $duplicate = News::where('date',$request->get('date'))->first();
            if($duplicate)
            {
                return redirect('admin/create-news/')->withErrors('This date is already busy.')->withInput();
            }

            if ($request->hasFile('image')) {
                $image = new Image();
                $image = $request->file('image');
                $imageName =  'news' . $news->date . '.' .$image->getClientOriginalExtension();
                $image->move(base_path() . '/content/img/news/', $imageName);

                $news->img_path = '/content/img/news/' . $imageName;
            }
            $news->save();

            $data['message'] = 'News was created successfully.';
            return redirect('/admin/news')->with($data);          
        }      
    } 

    public function edit(Request $request,$id)
    {
        if($request->user()->is_admin()) {
            $news = News::where('id',$id)->first();
            if($news) {
                return view('admin.news.edit')->withNews($news);
            } else {
                return redirect('/admin/news')->withErrors('There is no susch news.');            
            }
        }
    }

    public function update(NewsRequest $request)
    {
        if($request->user()->is_admin()) {
            $news_id = $request->input('news_id');
            $news = News::find($news_id);
            if($news) {
                $news->title = $request->input('title');
                $news->body = $request->input('body');
                $news->short_desc = $request->get('short_desc');
                $news->date = $request->get('date'); 
                $news->slug = str_slug($news->date .'-'. $news->title);

                $duplicate = News::where('date',$request->get('date'))->first();
                if($duplicate)
                {
                    if($duplicate->id != $news_id) {
                        return redirect('admin/edit-news/'.$news_id)->withErrors('This date is already busy.');
                    }
                }

                if ($request->hasFile('image')) {
                    File::delete(public_path().$news->img_path);
                    $image = new Image();
                    $image = $request->file('image');
                    $imageName =  'news' . $news->date . '.' .$image->getClientOriginalExtension();
                    $image->move(base_path() . '/content/img/news/', $imageName);
                    $news->img_path = '/content/img/news/' . $imageName;             
                }
                $news->save();

                $data['message'] = 'News was updated successfully.';
                return redirect('/admin/news')->with($data);    
            }
        }
    } 

    public function delete(Request $request,$id)
    {
        if($request->user()->is_admin()) { 
            $news = News::find($id);
            if($news) {
                $news->delete();
                $data['message'] = 'News deleted successfully';
                return redirect('/admin/news')->with($data);                 
            } else {
                return redirect('/admin/news')->withErrors('There is no susch news.');             
            }
        }
    }

    public function all(Request $request)
    {
        if($request->user()->is_admin())
        {
            $news = News::orderBy('date','desc')->paginate(20);   
            return view('admin.news.all')->withNews($news);
        }
    }        
}