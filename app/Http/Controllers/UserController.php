<?php

namespace App\Http\Controllers;

use Log;
use Image;
use File;
use App\User;
use Redirect;
use App\Http\Requests;
use App\Http\Requests\EventRequest;
use Illuminate\Http\Request;

class UserController extends Controller
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

    public function delete(Request $request,$id)
    {
        if($request->user()->is_admin()) { 
            $user = User::find($id);
            if($user) {
                $user->delete();
                $data['message'] = 'User deleted successfully';
                return redirect('/admin/users')->with($data);                 
            } else {
                return redirect('/admin/users')->withErrors('There is no susch user.');             
            }
        }
    }

    public function approve(Request $request,$id)
    {
        if($request->user()->is_admin()) { 
            $user = User::find($id);
            if($user) {
                $user->role = "admin";
                $user->save();
                $data['message'] = 'User approved successfully';
                return redirect('/admin/users')->with($data);                 
            } else {
                return redirect('/admin/users')->withErrors('There is no susch user.');             
            }
        }
    }    

    public function all(Request $request)
    {
        if($request->user()->is_admin())
        {
            $users = User::orderBy('id','desc')->paginate(20);          
            return view('admin.user.all')->withUsers($users);
        }
    }        
}
