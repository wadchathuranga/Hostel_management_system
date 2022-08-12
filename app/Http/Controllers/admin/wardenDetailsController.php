<?php

namespace App\Http\Controllers\admin;

use DB;
use App\Warden;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class wardenDetailsController extends Controller
{
    //admin middleware
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    //warden details view
    public function index(){
        $all_warden=Warden::orderBy('created_at', 'desc')->paginate(5);
        $warden_all=count($all_warden);
        $warden_male=DB::table('wardens')->where('warden_gender','=','Male')->count();
        $warden_female=DB::table('wardens')->where('warden_gender','=','Female')->count();
        //create array and pass/return data to view
        $data = [];
        $data['all']=$warden_all;
        $data['wMail']=$warden_male;
        $data['wFemale']=$warden_female;
        return view('admin.wardens_details_table')->with('wardens_details',$all_warden)->withData($data);
    }

    //add new warden
    public function save(Request $request){
        $warden= new Warden;
        $warden->warden_name = $request->warden_name;
        $warden->warden_gender = $request->warden_gender;
        $warden->warden_mobile_no = $request->warden_mobile_no;
        $warden->warden_hostel_id = $request->warden_hostel_id;
        $warden->save();
        //if this return function run, ajax code script is not work. when it is not work this code run
        //return redirect('hotels_details_view')->with('message',"New Hostel Added Successful");
    }

    //warden search
    public function search(Request $request) {
        $search = $request->get('search');
        if ($search == null){
            return redirect()->intended(route('wardens_details_view'));
        }else {
            $posts = DB::table('wardens')->where('warden_name', 'like', '%' . $search . '%')
                ->orWhere('warden_gender', 'like', '%' . $search . '%')
                ->orWhere('warden_mobile_no', 'like', '%' . $search . '%')
                ->orWhere('warden_hostel_id', 'like', '%' . $search . '%')->paginate(5);
            $warden_all = Warden::all()->count();
            $warden_male = DB::table('wardens')->where('warden_gender', '=', 'Male')->count();
            $warden_female = DB::table('wardens')->where('warden_gender', '=', 'Female')->count();
            //create array and pass/return data to view
            $data = [];
            $data['all'] = $warden_all;
            $data['wMail'] = $warden_male;
            $data['wFemale'] = $warden_female;
            return view('admin.wardens_details_table')->with('wardens_details', $posts)->withData($data);
        }
    }

    //warden details update
    public function update(Request $request, $id){
        $wardenDetails = Warden::find($id);
        $wardenDetails->warden_name = $request->input('wdn_name');
        $wardenDetails->warden_gender = $request->input('wdn_gender');
        $wardenDetails->warden_mobile_no = $request->input('wdn_mobile_no');
        $wardenDetails->warden_hostel_id = $request->input('wdn_hostel_id');
        $wardenDetails->save();
        return $wardenDetails;
    }

    //warden detail delete
    public function delete($id){
        $deletewarden = Warden::find($id);
        $deletewarden->delete();
        return $deletewarden;
    }
}
