<?php

namespace App\Http\Controllers\admin;

use App\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class userController extends Controller
{
    //admin middleware
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    //view user details
    public function index(){
        $user_data = Admin::orderBy('created_at','desc')->paginate(5);
        return view('admin.user_details_table')->with('user_details',$user_data);
    }


    //add new user details
    public function save(Request $request){
        $this->validate($request, [
            'name'=>'required',
            'email'=>'required|email|unique:admins',
            'password'=>'required|min:4',
            'repassword'=>'required|min:4',
            'job_title'=>'required'
        ]);

        $usr=new Admin;
        $usr->name = $request->name;
        $usr->email = $request->email;
        $usr->password = $request->password;
        $usr->job_title = $request->job_title;
        $usr->save();
    }


    //user detail delete
    public function delete($id){
        $deleteUser = Admin::find($id);
        $deleteUser->delete();
        return $deleteUser;
    }
}
