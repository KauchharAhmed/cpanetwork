<?php

namespace App\Http\Controllers; 

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests;
use DB;
use Session;


class BalanceTransferController extends Controller
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

// function for balance transfer
    public function balanceTransfer()
    {
    	return view('balanceTransfer.balanceTransfer');
    }

// function for balance transfer to user
    public function balanceTransferToUser(Request $request)
    {
    	// Validation
        $this->validate($request, [
        'reciverId' 			=> 'required',
        'transferAmount' 		=> 'required',
        'confirmTransferAmount' => 'required',
        ]);

        //Collecting data from html form
        $reciverId 				= trim($request->reciverId);
        $transferAmount 		= trim($request->transferAmount);
        $confirmTransferAmount 	= trim($request->confirmTransferAmount);

        if ($transferAmount != $confirmTransferAmount) {
        	Session::put('failed','Sorry ! Transfer Amount & Confirm Transfer Amount Did Not Match. Please Try Again.');
            return Redirect::to('balanceTransfer');
            exit();
        }

        // check reciver 
	    $count = DB::table('tbl_balance')->where('affiliate_id',$reciverId)->count();

	    if ($count == 0) {
	    	Session::put('failed','Sorry ! Reciver Not Found, Please Try Again');
	        return Redirect::to('balanceTransfer');
	        exit();
	    }

        $loged_id = Session::get('admin_id') ;
        $affiliate_id_query = DB::table('tbl_affiliates')->where('id',$loged_id)->first();
        $affiliate_id = $affiliate_id_query->affiliate_id;

         #----------------- Balance check------------------------#
	    $balance_amt_query = DB::table('tbl_balance')->where('affiliate_id', $affiliate_id)->first();

	    $available_balance =  $balance_amt_query->balance;
	    if($available_balance < $transferAmount)
	    {
	        Session::put('failed','Sorry ! Insufficient Balance Of Your Balance. Try Again After Available Balance');
	        return Redirect::to('balanceTransfer');
	        exit();
	    }
	    #----------------- end balance check-------------------------#

	    // check reciver current balance
	    $reciver_balance = DB::table('tbl_balance')->where('affiliate_id',$reciverId)->first();
	    $reciver_current_balance = $reciver_balance->balance ;

	    //echo "reciver balance = ". $reciver_current_balance ;

	    // check sender current balance
	    $sender_balance = DB::table('tbl_balance')->where('affiliate_id',$affiliate_id)->first();
	    $sender_current_balance = $sender_balance->balance ;

	    //echo "sender balance = ". $sender_current_balance ;
	   

	    //insert into tbl_transfer_history
	    $data = array();
	    $data['sender_id']   = $affiliate_id ;
	    $data['receiver_id'] = $reciverId ;
	    $data['amount'] 	 = $transferAmount ;
	    $data['created_at']  = $this->rcdate ;
	    DB::table('tbl_transfer_history')->insert($data);

	    // reciver balance update
	    $data1 = array();
	    $data1['balance'] = $reciver_current_balance + $transferAmount ;
	    DB::table('tbl_balance')->where('affiliate_id',$reciverId)->update($data1);

	    // sender balance update
	    $data2 = array();
	    $data2['balance'] = $sender_current_balance - $transferAmount ;
	    $query = DB::table('tbl_balance')->where('affiliate_id',$affiliate_id)->update($data2);

	    if($query){
            Session::put('success','Congratulations, Balance Transfer Completed sucessfully !!');
            return Redirect::to('balanceTransfer');
        }else{
            Session::put('failed','Alas !! Error occured, try again.');
            return Redirect::to('balanceTransfer');
        }

    }

// function for manage balance transfer
    public function manageBalanceTransfer()
    {
        $affiliate_id = Session::get('affiliate_id') ;
        $result = DB::table('tbl_transfer_history')->where('sender_id',$affiliate_id)->get();
        return view('balanceTransfer.manageBalanceTransfer')->with('result',$result);
    }




} // end of controller
