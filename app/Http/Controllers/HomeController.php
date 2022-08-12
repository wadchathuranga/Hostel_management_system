<?php

namespace App\Http\Controllers;

use App\Facultie;
use App\HostelRequest;
use App\Hostel;
use DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class HomeController extends Controller
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

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    //students dashboard view
    public function index() {
        $req_valid='false';
        $btn_valid=HostelRequest::all();
        foreach ($btn_valid as $valid){
            if($valid->std_uic_no == Auth::user()->std_uic_no){
                $req_valid="true";
                break;
            }
        }

        $fac_count = Facultie::all()->count();
        $hstl_count = Hostel::all()->count();
        $spaces = DB::table('hostels')->sum('no_of_students');
        return view('students_dashboard')
            ->with('fac_count',$fac_count)
            ->with('hstl_count',$hstl_count)
            ->with('spaces',$spaces)
            ->with('req_valid',$req_valid);
    }

    //hostel list table
    public function hostels(){
        return view('hostel_list');
    }

    //students about page view
    public function about() {
        return view('about');
    }
}
