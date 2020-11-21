<?php

namespace App\Http\Controllers; 

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests;
use DB;
use Session;

class ReportController extends Controller
{
    private $rcdate ;
    private $loged_id ;
    private $current_time ;
    private $affiliate_id ;

    public function __construct()
    {
        date_default_timezone_set('Asia/Dhaka');
        $this->rcdate = date('Y-m-d');
        $this->loged_id     = Session::get('admin_id');
        $this->current_time = date('H:i:s');
        $this->affiliate_id = Session::get('affiliate_id');
    }

   // function for balance transfer report 
    public function balanceTransferReport()
    {
    	return view('report.balanceTransferReport');
    }

    // function for accountant balance transfer report view
	public function balanceTransferReportView(Request $request)
    {
          $from_date = trim($request->from_date);
          $to_date   = trim($request->to_date);
          $from      = date('Y-m-d',strtotime($from_date)) ;
          $to        = date('Y-m-d',strtotime($to_date)) ;
        $result = DB::table('tbl_transfer_history')
        ->join('tbl_affiliates','tbl_affiliates.affiliate_id','=','tbl_transfer_history.sender_id')
        ->select('tbl_transfer_history.*','tbl_affiliates.first_name')
        ->whereBetween('tbl_transfer_history.created_at', [$from, $to])
        ->get();
        return view ('view_report.balanceTransferReportView')->with('result',$result)->with('from',$from)->with('to',$to) ;
    }


} // end of controller
