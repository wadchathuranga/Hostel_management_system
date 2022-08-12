<?php

namespace App\Http\Controllers\admin;

use App\ContactMessage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class admin_contactMessageController extends Controller
{
    //admin middleware
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    //msg details view
    public function index(){
        $msg=ContactMessage::orderBy('created_at','desc')->paginate(10);
        $msg_count=count($msg);
        $msg_new=DB::table('contact_messages')->where('isRead','=','0')->count();
        return view('admin.contact_messages_table')
            ->with('all_msg',$msg)
            ->with('msg_new',$msg_new)
            ->with('msg_count',$msg_count);
    }

    //read or not
    public function read($id){
        $read=ContactMessage::find($id);
        $read->isRead = 1;
        $read->save();
        return redirect()->back();
    }

    //message detail delete
    public function delete($id){
        $deleteMsg = ContactMessage::find($id);
        $deleteMsg->delete();
        return $deleteMsg;
    }
}
