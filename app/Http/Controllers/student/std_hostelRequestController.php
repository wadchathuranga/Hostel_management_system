<?php

namespace App\Http\Controllers\student;

use DB;
use App\HostelRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class std_hostelRequestController extends Controller
{
    //middleware
    public function __construct()
    {
        $this->middleware('auth');
    }

    //hostel request form view
    public function index() {
        return view('hostelRequestForm');
    }

    //hostel request save
    public function save(Request $request) {
        $this->validate($request, [
            'std_uic_no'=>'required|unique:hostel_requests',
            'std_nic_no'=>'required|unique:hostel_requests',
            'academic_year'=>'required',
            'email'=>'required|unique:hostel_requests',
            'method'=>'required',
            'bank_name'=>'required',
            'transaction_number'=>'required',
            'transaction_amount'=>'required',
            'transaction_date'=>'required'
        ]);

        $hostel_req=false;
        $all_transactionNo=DB::table('bank_records')->select('transaction_no')->get();
        foreach ($all_transactionNo as $transactionNo){
            if($request->transaction_number == $transactionNo->transaction_no){
                $hostel_req=true;
                break;
            }
        }

        if ($hostel_req){
            $req = new HostelRequest();
            $req->std_uic_no = $request->input('std_uic_no');
            $req->std_nic_no = $request->input('std_nic_no');
            $req->academic_year = $request->input('academic_year');
            $req->email = $request->input('email');
            $req->method = $request->input('method');
            $req->bank_name = $request->input('bank_name');
            $req->transaction_number = $request->input('transaction_number');
            $req->transaction_amount = $request->input('transaction_amount');
            $req->transaction_date = $request->input('transaction_date');
            $req->save();
            return redirect()->intended(route('home'))->with('req',"Request Send Successful");;
        }
        else{
            return redirect()->back()->with('message',"Your have not paid hostel fees!");
        }
    }

}
