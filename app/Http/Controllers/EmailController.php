<?php

namespace App\Http\Controllers; 

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests;
use DB;
use Session;
use Mail;

class EmailController extends Controller
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

    // function for send mail
     public function sendEmail()
    {
        $data['title'] = "This is Test Mail Title";
 
        Mail::send('email', $data, function($message) {
            $message->to('asianit2019@gmail.com', 'Avijit Ghosh')->subject('This is mail subject');
        });
 
        if (Mail::failures()) {
           //return response()->Fail('Sorry! Please try again latter');
           Session::put('failed','Sorry! Please try again latter');
           return Redirect::to('/login');
         }else{
           //return response()->success('Great! Successfully send in your mail');
           Session::put('succes','Great! Successfully send in your mail');
           return Redirect::to('/login');
         }
    }



} // end of controller
