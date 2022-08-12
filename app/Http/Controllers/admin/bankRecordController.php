<?php

namespace App\Http\Controllers\admin;

use App\BankRecord;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class bankRecordController extends Controller
{
    //admin middleware
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    //bank record table view
    public function index(){
        $bank_record = BankRecord::orderBy('created_at','desc')->paginate(10);
        $all_rec=count($bank_record);
        $boc=DB::table('bank_records')->where('bank_name','=','BOC')->count();
        $pb=DB::table('bank_records')->where('bank_name','=','PB')->count();
        return view('admin.bank_record_details_table')
            ->with('bank_record',$bank_record)
            ->with('all_rec',$all_rec)
            ->with('boc',$boc)
            ->with('pb',$pb);

    }

    //delete bank record details
    public function delete($id){
        $deleteBankRec = BankRecord::find($id);
        $deleteBankRec->delete();
        return $deleteBankRec;
    }
}
