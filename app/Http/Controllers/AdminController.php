<?php

namespace App\Http\Controllers;

use App\Facultie;
use App\Hostel;
use App\User;
use App\Warden;
use DB;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $hostelCount=Hostel::all()->count();
        $std_Count=User::all()->count();
        $wdn_Count=Warden::all()->count();
        $fac_Count=Facultie::all()->count();
        $available_spaces=DB::table('hostels')->sum('no_of_students');

        return view('admin.admin_dashboard')
            ->with('hostelCount',$hostelCount)
            ->with('std_count',$std_Count)
            ->with('wdn_count',$wdn_Count)
            ->with('fac_count',$fac_Count)
            ->with('space_count',$available_spaces);
    }

}
