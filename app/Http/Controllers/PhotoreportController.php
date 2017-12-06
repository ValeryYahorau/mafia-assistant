<?php

namespace App\Http\Controllers;

use Log;
use Input;
use Storage;
use Image;
use URL;
use File;
use App\Photoreport;
use App\Photo;
use Redirect;
use App\Http\Requests;
use App\Http\Requests\PhotoreportRequest;
use Illuminate\Http\Request;
use Config;

class PhotoreportController extends Controller
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
            return view('admin.photoreport.create');
        }
    }

    public function save(PhotoreportRequest $request)
    {
        if($request->user()->is_admin()) {
            $photoreport = new Photoreport();
            $photoreport->title_en = $request->get('title_en');
            $photoreport->title_ru = $request->get('title_ru');            
            $photoreport->date = $request->get('date');        
            $photoreport->slug = str_slug($photoreport->date .'-'. $photoreport->title_en);
            
            $duplicate = Photoreport::where('date',$request->get('date'))->first();
            if($duplicate)
            {
                return redirect('admin/create-photoreport/')->withErrors('This date is already busy.')->withInput();
            }

            if ($request->hasFile('image')) {
                $image = new Image();
                $image = $request->file('image');
                $imageName =  'ph' . $photoreport->date . '.' .$image->getClientOriginalExtension();
                $image->move(base_path() . '/content/img/photoreports/', $imageName);

                $photoreport->img_path = '/content/img/photoreports/' . $imageName;
            }   

            $photoreport->save();

            return redirect('/admin/upload-photos/'.$photoreport->id);
        }
    } 

    public function uploadPhotos(Request $request,$id)
    {
        if($request->user()->is_admin()) {
            $photoreport = Photoreport::where('id',$id)->first();
            if($photoreport) {
                return view('admin.photoreport.upload')->withPhotoreport($photoreport);
            } else {
                return redirect('/admin/photoreports')->withErrors('There is no susch photoreport.');               
            }
        }
    }

    public function edit(Request $request,$id)
    {
        if($request->user()->is_admin()) {
            $photoreport = Photoreport::where('id',$id)->first();
            if($photoreport) {
                return view('admin.photoreport.edit')->withPhotoreport($photoreport);
            } else {
                return redirect('/admin/photoreports')->withErrors('There is no susch photoreport.');               
            }
        }
    }

    public function update(PhotoreportRequest $request)
    {
        if($request->user()->is_admin()) {
            $photoreport_id = $request->input('photoreport_id');
            $photoreport = Photoreport::find($photoreport_id);
            if($photoreport) {
                $photoreport->title_en = $request->get('title_en');
                $photoreport->title_ru = $request->get('title_ru'); 
                $photoreport->date = $request->get('date');        
                $photoreport->slug = str_slug($photoreport->date .'-'. $photoreport->title_en);
                
                $duplicate = Photoreport::where('date',$request->get('date'))->first();
                if($duplicate)
                {
                    if($duplicate->id != $photoreport_id) {
                        return redirect('admin/edit-photoreport/'.$photoreport_id)->withErrors('This date is already busy.');
                    }
                } 

                if ($request->hasFile('image')) {
                    File::delete(public_path().$photoreport->img_path);
                    $image = new Image();
                    $image = $request->file('image');
                    $imageName =  'ph' . $photoreport->date . '.' .$image->getClientOriginalExtension();
                    $image->move(base_path() . '/content/img/photoreports/', $imageName);
                    
                    $photoreport->img_path = '/content/img/photoreports/' . $imageName;             
                }
                $photoreport->save();

                $data['message'] = 'Photoreport was updated successfully.';
                return redirect('/admin/photoreports')->with($data);  
            }

        }
    } 

    public function delete(Request $request,$id)
    {
        if($request->user()->is_admin()) { 
            $photoreport = Photoreport::find($id);
            if($photoreport) {
                $photoreport->delete();
            }
            $data['message'] = 'Photoreport was deleted successfully.';
            return redirect('/admin/photoreports')->with($data);
        }
    }

    public function uploadPhoto(Request $request)
    {
        if($request->user()->is_admin())
        {        
            $photoreportId = $request->input('photoreport_id');
            $photoreportDate = $request->input('photoreport_date');

            $lastPhotoPosition = Photo::where('photoreport_id', $photoreportId)->max('position'); 
            $name = str_random(30);

            $file = $request->file('file');
            $photoImage = $file;
            $photoImageName =  'ph_l_' . $name . '.' .$photoImage->getClientOriginalExtension();
            $photoImage->move(base_path() . '/content/img/photoreports/'.$photoreportDate, $photoImageName);

            $smallPhotoImageName =  'ph_s_' . $name . '.' .$photoImage->getClientOriginalExtension();
            $width = Image::make(base_path().'/content/img/photoreports/'. $photoreportDate .'/'. $photoImageName)->width();
            $height = Image::make(base_path().'/content/img/photoreports/'. $photoreportDate .'/'. $photoImageName)->height();
            
            $newWidth = 0; $newHeight = 0;
            if ($width >= $height) {
                $newWidth = Config::get('noccms.img_preview_size');
                $newHeight = $height*($newWidth/$width);
            } else {
                $newHeight = Config::get('noccms.img_preview_size');
                $newWidth = $width*($newHeight/$height);
            }

            $smallImage = Image::make(base_path().'/content/img/photoreports/'. $photoreportDate .'/'. $photoImageName)->resize($newWidth, $newHeight);
            $smallImage->save(base_path() . '/content/img/photoreports/'. $photoreportDate .'/'. $smallPhotoImageName);

            $photo = new Photo();
            $photo->photoreport_id = $photoreportId;
            $photo->position = 0;
            $photo->img_s_path = '/content/img/photoreports/'. $photoreportDate .'/'. $photoImageName;
            $photo->img_l_path = '/content/img/photoreports/'. $photoreportDate .'/'. $smallPhotoImageName;
            
            $photo->save();
            return $photo->id;
        }
    }

    public function deletePhoto(Request $request) 
    {
        if($request->user()->is_admin())
        {        
            $photoId = $request->input('id');
            $photo = Photo::find($photoId);
            if($photo) {
                $photo->delete();
            }
        }
    }

    public function all(Request $request)
    {
        if($request->user()->is_admin())
        {
            $photoreports = Photoreport::orderBy('date','desc')->paginate(20);       
            return view('admin.photoreport.all')->withPhotoreports($photoreports);
        }
    }        
}
