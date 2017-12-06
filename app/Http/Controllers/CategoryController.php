<?php

namespace App\Http\Controllers;

use Log;
use Input;
use App\Category;
use Redirect;
use App\Http\Requests;
use App\Http\Requests\CategoryRequest;
use Illuminate\Http\Request;
use Config;

class CategoryController extends Controller
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
            return view('admin.category.create');
        }
    }

    public function save(CategoryRequest $request)
    {
        if($request->user()->is_admin()) {
            $category = new Category();
            $category->title = $request->get('title');
            $category->description = $request->get('body');        
            $category->save();

            $data['message'] = 'Category was created successfully.';
            return redirect('/admin/category')->with($data); 
        }
    } 

    public function edit(Request $request,$id)
    {
        if($request->user()->is_admin()) {
            $category = Category::where('id',$id)->first();
            if($category) {
                return view('admin.category.edit')->withCategory($category);
            } else {
                return redirect('/admin/category')->withErrors('There is no such category.');               
            }
        }
    }

    public function update(CategoryRequest $request)
    {
        if($request->user()->is_admin()) {
            $category_id = $request->input('category_id');
            $category = Category::find($category_id);
            if($category) {
                $category->title = $request->get('title');
                $category->description = $request->get('body');        
                $category->save();

                $data['message'] = 'Category was updated successfully.';
                return redirect('/admin/category')->with($data);  
            }

        }
    } 

    public function delete(Request $request,$id)
    {
        if($request->user()->is_admin()) { 
            $category = Category::find($id);
            if($category) {
                $category->delete();
            }
            $data['message'] = 'Category was deleted successfully.';
            return redirect('/admin/category')->with($data);
        }
    }

    public function all(Request $request)
    {
        if($request->user()->is_admin())
        {
            $categories = Category::orderBy('id','desc')->paginate(20);       
            return view('admin.category.all')->withCategories($categories);
        }
    }        
}
