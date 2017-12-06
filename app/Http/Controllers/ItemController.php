<?php

namespace App\Http\Controllers;

use Log;
use Image;
use File;
use App\Item;
use App\Category;
use App\Photo;
use Redirect;
use App\Http\Requests;
use App\Http\Requests\ItemRequest;
use Illuminate\Http\Request;
use Config;

class ItemController extends Controller
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
            $categories = Category::orderBy('id','desc')->get();       
            return view('admin.item.create')->withCategories($categories);
        }
    }

    public function save(ItemRequest $request)
    {
        if($request->user()->is_admin()) {
            $item = new Item();
            $item->title = $request->get('title');
            $item->short_desc = $request->get('short_desc');            
            $item->body = $request->get('body');        
            $item->slug = str_slug($item->title);
            $item->position = $request->get('position');
            $item->category_id = $request->get('category_id');

            $duplicate = Item::where('title',$request->get('title'))->first();
            if($duplicate)
            {
                return redirect('admin/create-item/')->withErrors('This title is already busy.')->withInput();
            }

            if ($request->hasFile('image')) {
                $image = new Image();
                $image = $request->file('image');
                $imageName =  'item' . $item->slug . '.' .$image->getClientOriginalExtension();
                $image->move(base_path() . '/content/img/items/', $imageName);
                $item->img_path = '/content/img/items/' . $imageName;
            }   

            $item->save();

            return redirect('/admin/upload-photos/'.$item->id);
        }
    } 

    public function uploadPhotos(Request $request,$id)
    {
        if($request->user()->is_admin()) {
            $item = Item::where('id',$id)->first();
            if($item) {
                return view('admin.item.upload')->withItem($item);
            } else {
                return redirect('/admin/item')->withErrors('There is no such item.');               
            }
        }
    }

    public function edit(Request $request,$id)
    {
        if($request->user()->is_admin()) {
            $item = Item::where('id',$id)->first();
            if($item) {
                $categories = Category::orderBy('id','desc')->get(); 
                return view('admin.item.edit')->withItem($item)->withCategories($categories);
            } else {
                return redirect('/admin/item')->withErrors('There is no such item.');               
            }
        }
    }

    public function update(ItemRequest $request)
    {
        if($request->user()->is_admin()) {
            $item_id = $request->input('item_id');
            $item = Item::find($item_id);
            if($item) {
                $item->title = $request->get('title');
                $item->short_desc = $request->get('short_desc');            
                $item->body = $request->get('body');        
                $item->slug = str_slug($item->title);
                $item->position = $request->get('position');
                $item->category_id = $request->get('category_id');

                $duplicate = Item::where('title',$request->get('title'))->first();
                if($duplicate)
                {
                    if($duplicate->id != $item_id) {
                        return redirect('admin/edit-item/'.$item_id)->withErrors('This title is already busy.');
                    }
                }

                if ($request->hasFile('image')) {
                    File::delete(public_path().$item->img_path);
                    $image = new Image();
                    $image = $request->file('image');
                    $imageName =  'item' . $item->slug . '.' .$image->getClientOriginalExtension();
                    $image->move(base_path() . '/content/img/items/', $imageName);
                    $item->img_path = '/content/img/items/' . $imageName;            
                }
                $item->save();

                $data['message'] = 'Item was updated successfully.';
                return redirect('/admin/item')->with($data);  
            }

        }
    } 

    public function delete(Request $request,$id)
    {
        if($request->user()->is_admin()) { 
            $item = Item::find($id);
            if($item) {
                $item->delete();
            }
            $data['message'] = 'Item was deleted successfully.';
            return redirect('/admin/item')->with($data);
        }
    }

    public function uploadPhoto(Request $request)
    {
        if($request->user()->is_admin())
        {        
            $item_id = $request->input('item_id');

            $lastPhotoPosition = Photo::where('item_id', $item_id)->max('position'); 
            $name = str_random(30);

            $file = $request->file('file');
            $photoImage = $file;
            $photoImageName =  'item_l_' . $name . '.' .$photoImage->getClientOriginalExtension();
            $photoImage->move(base_path() . '/content/img/items/'.$item_id, $photoImageName);

            $smallPhotoImageName =  'item_s_' . $name . '.' .$photoImage->getClientOriginalExtension();
            $width = Image::make(base_path().'/content/img/items/'. $item_id .'/'. $photoImageName)->width();
            $height = Image::make(base_path().'/content/img/items/'. $item_id .'/'. $photoImageName)->height();
            
            $newWidth = 0; $newHeight = 0;
            if ($width >= $height) {
                $newWidth = Config::get('noccms.img_preview_size');
                $newHeight = $height*($newWidth/$width);
            } else {
                $newHeight = Config::get('noccms.img_preview_size');
                $newWidth = $width*($newHeight/$height);
            }

            $smallImage = Image::make(base_path().'/content/img/items/'. $item_id .'/'. $photoImageName)->resize($newWidth, $newHeight);
            $smallImage->save(base_path() . '/content/img/items/'. $item_id .'/'. $smallPhotoImageName);

            $photo = new Photo();
            $photo->item_id = $item_id;
            $photo->position = 0;
            $photo->img_s_path = '/content/img/items/'. $item_id .'/'. $photoImageName;
            $photo->img_l_path = '/content/img/items/'. $item_id .'/'. $smallPhotoImageName;
            
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
            $items = Item::orderBy('id','desc')->paginate(20);       
            return view('admin.item.all')->withItems($items);
        }
    }        
}