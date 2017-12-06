<?php

namespace App\Http\Controllers;

use Log;
use Image;
use File;
use App\Seorecord;
use Redirect;
use App\Http\Requests;
use App\Http\Requests\SEORequest;
use Illuminate\Http\Request;

class SEOController extends Controller
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
            return view('admin.seo.create');
        }
    }

        public function createDefault(Request $request)
    {
        if($request->user()->is_admin())
        {
            return view('admin.seo.create');
        }
    }

    public function save(SEORequest $request)
    {
        if($request->user()->is_admin()) {
            $seorecord = new Seorecord();
            $seorecord->title = $request->get('title');
            $seorecord->description = $request->get('description');
            $seorecord->keywords = $request->get('keywords'); 
            $seorecord->locale = $request->get('locale');                    
            $seorecord->route = $request->get('route'); 

            $duplicate = Seorecord::where('route',$request->get('route'))->where('locale',$request->get('locale'))->first();
            if($duplicate)
            {
                return redirect('admin/create-seo')->withErrors('This route is already busy.')->withInput();
            }

            $seorecord->save();

            $data['message'] = 'SEO record was created successfully.';
            return redirect('/admin/seo')->with($data);                  
        }      
    } 

    public function edit(Request $request,$id)
    {
        if($request->user()->is_admin()) {
            $seorecord = Seorecord::where('id',$id)->first();
            if($seorecord) {
                return view('admin.seo.edit')->withSeorecord($seorecord);
            } else {
                return redirect('/admin/seo')->withErrors('There is no susch seo record.');            
            }
        }
    }

    public function update(SEORequest $request)
    {
        if($request->user()->is_admin()) {
            $seorecord_id = $request->input('seorecord_id');
            $seorecord = Seorecord::find($seorecord_id);
            if($seorecord) {
                $seorecord->title = $request->get('title');
                $seorecord->description = $request->get('description');
                $seorecord->keywords = $request->get('keywords'); 
                $seorecord->locale = $request->get('locale'); 
                $seorecord->route = $request->get('route');               
                $seorecord->save();

                $data['message'] = 'Seo record was updated successfully.';
                return redirect('/admin/seo')->with($data);     
            }
        }
    } 

    public function delete(Request $request,$id)
    {
        if($request->user()->is_admin()) { 
            $seorecord = Seorecord::find($id);
            if($property) {
                $seorecord->delete();
                $data['message'] = 'Seo record deleted successfully';
                return redirect('/admin/seo')->with($data);                 
            } else {
                return redirect('/admin/seo')->withErrors('There is no Seo record.');             
            }
        }
    }

    public function all(Request $request)
    {
        if($request->user()->is_admin())
        {
            $seos = Seorecord::orderBy('id','desc')->paginate(20);   
            return view('admin.seo.all')->withSeo($seos);
        }
    }        
}
