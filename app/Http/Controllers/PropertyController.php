<?php

namespace App\Http\Controllers;

use Log;
use Image;
use File;
use App\Property;
use Redirect;
use App\Http\Requests;
use App\Http\Requests\PropertyRequest;
use Illuminate\Http\Request;

class PropertyController extends Controller
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
            return view('admin.property.create');
        }
    }


    public function save(PropertyRequest $request)
    {
        if($request->user()->is_admin()) {
            $property = new Property();
            $property->key = $request->get('key');
            $property->value = $request->get('value');
            $property->description = $request->get('description');
            $property->locale = $request->get('locale');
            
            $property->save();

            $data['message'] = 'Property was created successfully.';
            return redirect('/admin/properties')->with($data);          
        }      
    } 


    public function edit(Request $request,$id)
    {
        if($request->user()->is_admin()) {
            $property = Property::where('id',$id)->first();
            if($property) {
                return view('admin.property.edit')->withProperty($property);
            } else {
                return redirect('/admin/properties')->withErrors('There is no susch property.');            
            }
        }
    }

    public function update(PropertyRequest $request)
    {
        if($request->user()->is_admin()) {
            $property_id = $request->input('property_id');
            $property = Property::find($property_id);
            if($property) {
                $property->value = $request->get('value');

                $property->save();

                $data['message'] = 'Property was updated successfully.';
                return redirect('/admin/properties')->with($data);     
            }
        }
    } 

    public function delete(Request $request,$id)
    {
        if($request->user()->is_admin()) { 
            $property = Property::find($id);
            if($property) {
                $property->delete();
                $data['message'] = 'Property deleted successfully';
                return redirect('/admin/properties')->with($data);                 
            } else {
                return redirect('/admin/properties')->withErrors('There is no susch property.');             
            }
        }
    }

    public function all(Request $request)
    {
        if($request->user()->is_admin())
        {
            $properties = Property::orderBy('key','desc')->where('locale','ru')->paginate(40);   
            return view('admin.property.all')->withProperties($properties);
        }
    }

}
