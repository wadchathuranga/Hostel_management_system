<?php

namespace App\Http\Controllers\admin;

use App\Facultie;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class facultyDetailsController extends Controller
{
    //admin middleware
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    //faculty details view
    public function index() {
        $fac_all = Facultie::orderBy('created_at', 'desc')->paginate(6);
        $fac_count=count($fac_all);
        return view('admin.faculty_details_table')->with('fac_all',$fac_all)->with('fac_count',$fac_count);
    }

    //add new faculty
    public function faculty_add(Request $request) {
       /* $this->validate($request, [
            'faculty_code'=>'required',
            'faculty_name'=>'required'
        ]);*/
        $fac = new Facultie;
        $fac->faculty_code = $request->faculty_code;
        $fac->faculty_name = $request->faculty_name;
        $fac->save();
    }

    //faculty update
    public function update(Request $request, $id) {
        $id=$request->id;
        $fac_record = Facultie::find($id);
        $fac_record->faculty_code = $request->faculty_code;
        $fac_record->faculty_name = $request->faculty_name;
        $fac_record->save();
        return $fac_record;
    }

    //faculty details delete
    public function delete($id){
        $deleteFac = Facultie::find($id);
        $deleteFac->delete();
        return $deleteFac;
    }
}
