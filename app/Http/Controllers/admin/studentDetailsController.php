<?php

namespace App\Http\Controllers\admin;

use App\User;
use DB;
use App\Facultie;
use App\Student;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class studentDetailsController extends Controller
{
    //admin middleware
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    //students data display in table
    public function index(){
        $all_std=User::orderBy('created_at', 'desc')->paginate(5);
        $std_all=count($all_std);

        //create array and pass/return data to view
        $data = [];
        $data['all']=$std_all;
        $data['boy']=DB::table('users')->where('std_gender','=','Male')->count();
        $data['girl']=DB::table('users')->where('std_gender','=','Female')->count();
        $data['mgt']=DB::table('users')->where('std_faculty_id','=','MGT')->count();
        $data['sola']=DB::table('users')->where('std_faculty_id','=','SOLA')->count();
        $data['app']=DB::table('users')->where('std_faculty_id','=','APP')->count();
        $data['agri']=DB::table('users')->where('std_faculty_id','=','AGRI')->count();
        $data['geo']=DB::table('users')->where('std_faculty_id','=','GEO')->count();
        $data['tec']=DB::table('users')->where('std_faculty_id','=','TEC')->count();
        return view('admin.students_details_table')->with('students_details',$all_std)->withData($data);
    }

    //search function of students data_table
    public function search(Request $request) {

        //put into the data which user wants to search
        $search = $request->get('search');

        if ($search == null){
            return redirect()->intended(route('students_details_view'));
        }else {

            //the data which put variable, search following columns
            $all_std = DB::table('users')->where('std_uic_no', 'like', '%' . $search . '%')
                ->orWhere('std_first_name', 'like', '%' . $search . '%')
                ->orWhere('std_last_name', 'like', '%' . $search . '%')
                ->orWhere('std_birthday', 'like', '%' . $search . '%')
                ->orWhere('std_address', 'like', '%' . $search . '%')
                ->orWhere('std_mobile_no', 'like', '%' . $search . '%')
                ->orWhere('std_nic_no', 'like', '%' . $search . '%')->paginate(10);

            //create array and pass/return data to view
            $data = [];
            $data['all'] = count($all_std);
            $data['boy'] = DB::table('users')->where('std_gender', '=', 'Male')->count();
            $data['girl'] = DB::table('users')->where('std_gender', '=', 'Female')->count();
            $data['mgt'] = DB::table('users')->where('std_faculty_id', '=', 'MGT')->count();
            $data['sola'] = DB::table('users')->where('std_faculty_id', '=', 'SOLA')->count();
            $data['app'] = DB::table('users')->where('std_faculty_id', '=', 'APP')->count();
            $data['agri'] = DB::table('users')->where('std_faculty_id', '=', 'AGRI')->count();
            $data['geo'] = DB::table('users')->where('std_faculty_id', '=', 'GEO')->count();
            $data['tec'] = DB::table('users')->where('std_faculty_id', '=', 'TEC')->count();
            return view('admin.students_details_table')->with('students_details', $all_std)->withData($data);
        }
    }

    //new student add form view
    public function addStudent(){
        return view('admin.students_add_form');
    }

    //add new student record
    public function save(Request $request){
        $this->validate($request, [
            'std_first_name'=>'required',
            'std_last_name'=>'required',
            'std_gender'=>'required',
            'std_nic_no'=>'required|min:9|max:12|unique:students',
            'std_uic_no'=>'required|min:9|unique:students',
            'password'=>'required',
            'std_mobile_no'=>'required|min:10|max:10',
            'std_birthday'=>'required',
            'std_admission_date'=>'required',
            'std_faculty_id'=>'required',
            'distance'=>'required',
            'std_address'=>'required',
            'email'=>'required|email|unique:students'
        ]);

        $std_Details = new User();
        $std_Details->std_first_name = $request->input('std_first_name');
        $std_Details->std_last_name = $request->input('std_last_name');
        $std_Details->std_gender = $request->input('std_gender');
        $std_Details->std_nic_no = $request->input('std_nic_no');
        $std_Details->std_uic_no = $request->input('std_uic_no');
        $std_Details->password = $request->input('password');
        $std_Details->std_mobile_no = $request->input('std_mobile_no');
        $std_Details->std_birthday = $request->input('std_birthday');
        $std_Details->std_admission_date = $request->input('std_admission_date');
        $std_Details->std_faculty_id = $request->input('std_faculty_id');
        $std_Details->distance = $request->input('distance');
        $std_Details->std_address = $request->input('std_address');
        $std_Details->email = $request->input('email');
        $std_Details->save();
        return redirect()->back()->with('added',"Added Successful");
    }

    //data retrieve from database to select/dropdown
    public function view_update_form($id){
        $view_record=User::find($id);
        $fac_record=Facultie::all();
        return view('admin.students_update_form')->with('std_record',$view_record)->with('fac_record',$fac_record);
    }

    //update student records
    public function update(Request $request){
        $id=$request->id;
        $std_Details = User::find($id);
        $std_Details->std_uic_no = $request->input('std_uic_no');
        $std_Details->std_first_name = $request->input('std_first_name');
        $std_Details->std_last_name = $request->input('std_last_name');
        $std_Details->std_gender = $request->input('std_gender');
        $std_Details->std_birthday = $request->input('std_birthday');
        $std_Details->std_address = $request->input('std_address');
        $std_Details->std_nic_no = $request->input('std_nic_no');
        $std_Details->password = Hash::make($request->input('password'));
        $std_Details->std_mobile_no = $request->input('std_mobile_no');
        $std_Details->distance = $request->input('distance');
        $std_Details->std_admission_date = $request->input('std_admission_date');
        $std_Details->std_faculty_id = $request->input('std_faculty_id');
        $std_Details->email = $request->input('email');
        $std_Details->save();
        return redirect()->back()->with('updated',"Updated Successful");
    }

    //delete student records
    public function delete($id)
    {
        $deleteStudent = User::find($id);
        $deleteStudent->delete();
        return $deleteStudent;
    }
}
