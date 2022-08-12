<?php

namespace App\Http\Controllers\student;

use App\ContactMessage;
use App\Notifications\HostelRequestSubmit;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class std_contactMessageController extends Controller
{
    //middleware
    public function __construct()
    {
        $this->middleware('auth');
    }

    //students contact page view
    public function index() {
        return view('contact');
    }

    //save message to database
    public function save(Request $request){
        $this->validate($request, [
            'uic_no'=>'required|min:8|max:9',
            'first_name'=>'required',
            'last_name'=>'required',
            'message'=>'required'
        ]);
        $message=new ContactMessage;
        $message->uic_no = $request->uic_no;
        $message->first_name = $request->first_name;
        $message->last_name = $request->last_name;
        $message->message = $request->message;
        $message->save();

        auth()->user()->notify(new HostelRequestSubmit());

        return redirect()->back()->with('message',"Message send successful");
    }
}
