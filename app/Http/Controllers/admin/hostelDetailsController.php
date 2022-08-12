<?php

namespace App\Http\Controllers\admin;

use App\Warden;
use DB;
use App\Hostel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class hostelDetailsController extends Controller
{
    //admin middleware
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    //hostel details view
    public function index(){
        $allDetail=Hostel::orderBy('created_at', 'desc')->paginate(5);
        $allCounts=count($allDetail);
        $boyHostels=DB::table('hostels')->where('hostel_gender','=','Boy')->count();
        $girlHostels=DB::table('hostels')->where('hostel_gender','=','Girl')->count();
        $rentHostels=DB::table('hostels')->where('hostel_type','=','Rent')->count();
        $universityHostels=DB::table('hostels')->where('hostel_type','=','University')->count();
        $sum=DB::table('hostels')->sum('no_of_students');
        return view('admin.hostels_details_table')
            ->with('hotels_details',$allDetail)
            ->with('all',$allCounts)
            ->with('boy',$boyHostels)
            ->with('girl',$girlHostels)
            ->with('rent',$rentHostels)
            ->with('sum',$sum)
            ->with('university',$universityHostels);
    }

    //search hostel details
    public function search(Request $request) {
        $search = $request->get('search');
        if ($search == null){
            return redirect()->intended(route('hostels_details_view'));
        }else {
            $posts = DB::table('hostels')->where('hostel_name', 'like', '%' . $search . '%')
                ->orWhere('hostel_gender', 'like', '%' . $search . '%')
                ->orWhere('hostel_warden_id', 'like', '%' . $search . '%')
                ->orWhere('hostel_reserve_year', 'like', '%' . $search . '%')
                ->orWhere('hostel_location', 'like', '%' . $search . '%')->paginate(5);
            $allCounts = DB::table('hostels')->count();
            $boyHostels = DB::table('hostels')->where('hostel_gender', '=', 'Boy')->count();
            $girlHostels = DB::table('hostels')->where('hostel_gender', '=', 'Girl')->count();
            $rentHostels = DB::table('hostels')->where('hostel_type', '=', 'Rent')->count();
            $universityHostels = DB::table('hostels')->where('hostel_type', '=', 'University')->count();
            $sum = DB::table('hostels')->sum('no_of_students');
            return view('admin.hostels_details_table')
                ->with('hotels_details', $posts)
                ->with('all', $allCounts)
                ->with('boy', $boyHostels)
                ->with('girl', $girlHostels)
                ->with('rent', $rentHostels)
                ->with('sum', $sum)
                ->with('university', $universityHostels);
        }
    }

    //add new hostel
    public function save(Request $request){
        $hostel= new Hostel;
        $hostel->hostel_name = $request->hostel_name;
        $hostel->hostel_type = $request->hostel_type;
        $hostel->no_of_students = $request->no_of_students;
        $hostel->hostel_gender = $request->hostel_gender;
        $hostel->hostel_reserve_year = $request->hostel_reserve_year;
        $hostel->hostel_location = $request->hostel_location;
        $hostel->hostel_warden_id = $request->hostel_warden_id;
        $hostel->save();
        //if this return function run, ajax code script is not work. when it is not work this code run
        //return redirect('hotels_details_view')->with('message',"New Hostel Added Successful");
    }

    //update hostel details
    public function update(Request $request, $id){
        $hostelDetails = Hostel::find($id);
        $hostelDetails->hostel_name = $request->input('hostel_name');
        $hostelDetails->hostel_type = $request->input('hostel_type');
        $hostelDetails->no_of_students = $request->input('no_of_students');
        $hostelDetails->hostel_gender = $request->input('hostel_gender');
        $hostelDetails->hostel_reserve_year = $request->input('hostel_reserve_year');
        $hostelDetails->hostel_location = $request->input('hostel_location');
        $hostelDetails->hostel_warden_id = $request->input('hostel_warden_id');
        $hostelDetails->save();
        return $hostelDetails;
    }

    //delete hostel details
    public function delete($id){
        $deletehostel=Hostel::find($id);
        $deletehostel->delete();
        return $deletehostel;
    }
}
