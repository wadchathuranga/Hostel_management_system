<?php

namespace App\Http\Controllers\admin;

use DB;
use App\BankRecord;
use App\HostelRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class admin_hostelRequestController extends Controller
{
    //admin middleware
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    //hostel request table view - ADMIN
    public function admin_index() {
        $get_req = HostelRequest::orderBy('created_at','desc')->paginate(10);
        $req_count = count($get_req);
        $pending_count=DB::table('hostel_requests')->where('process','=','0')->count();
        $accepted_count=DB::table('hostel_requests')->where('process','=','1')->count();
        return view('admin.hostel_request_details_table')
            ->with('req_all',$get_req)
            ->with('pending_count',$pending_count)
            ->with('accepted_count',$accepted_count)
            ->with('req_count',$req_count);
    }

    //request search
    public function search(Request $request) {
        $search = $request->get('search');
        if ($search == null){
            return redirect()->intended(route('get_hostel_request'));
        }else{
            $posts = DB::table('hostel_requests')->where('std_reg_no', 'like', '%'.$search.'%')->orWhere('std_nic_no', 'like', '%'.$search.'%')->paginate(5);
            $req_count=HostelRequest::all()->count();
            $pending_count=DB::table('hostel_requests')->where('process','=','0')->count();
            $accepted_count=DB::table('hostel_requests')->where('process','=','1')->count();
            return view('admin.hostel_request_details_table')
                ->with('req_all',$posts)
                ->with('req_count',$req_count)
                ->with('pending_count',$pending_count)
                ->with('accepted_count',$accepted_count);
        }
    }

    //request accepting
    public function accepting($id) {
        $accepting = null;
        $transaction_done = "false";

        $accepting = HostelRequest::find($id);

        $bank_record = BankRecord::all();

        //check user is valid or invalid
        if($accepting != null){
            //foreach
            foreach ($bank_record as $record){
                //check transaction is done or not
                if(($accepting->transaction_number == $record->transaction_no) && ($accepting->bank_name == $record->bank_name)){
                    $transaction_done="true";

                    $tempDetails=BankRecord::find($record->id);
                    break;
                }
                //End check transaction is done or not
            }
            //End foreach

            //check transaction is done or not continue
            if($transaction_done=="true"){
                //check hostel fees paid less or right amount
                if($tempDetails->amount_of_paid == $accepting->transaction_amount){
                    $accepting->process=1;
                    $accepting->save();
                    return redirect()->back()->with('admin_reqSuccess',"Request Accepted");
                }else{
                    return redirect()->back()->with('admin_req',"You paid less amount than hostel fees");
                }
                //End check hostel fees paid less or right amount
            }else{
                return redirect()->back()->with('admin_req',"You did not pay hostel fees");
            }
            //End check transaction is done or not
        }else{
            return redirect()->back()->with('admin_req',"Invalid user");
        }
        //End check user is valid or invalid
    }

    //faculty details delete
    public function delete($id){
        $deleteReq = HostelRequest::find($id);
        $deleteReq->delete();
        return $deleteReq;
    }
}
