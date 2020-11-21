<?php

namespace App\Http\Controllers; 

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests;
use DB;
use Session;
use Mail;

class UserController extends Controller
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

// function for add country for admin
    public function addCountry()
    {
    	return view('country.addCountry');
    }
 // function for insert add country info
    public function addCountryInfo(Request $request)
    {
    	// Validation
        $this->validate($request, [
        'countryName' => 'required',
        ]);

        //Collecting data from html form
        $countryName = trim($request->countryName);
        $remarks 	 = trim($request->remarks);

        //Check duplicatet entry
        $count = DB::table('tbl_country_list')
        ->where('country_name', $countryName)
        ->count();

        if($count > 0){
            Session::put('failed','Sorry ! '.$countryName. ' Country Already Exits. Try to add new Country');
            return Redirect::to('addCountry');
            exit();
        }

        $data = array();
        $data['country_name']  = $countryName;
        $data['remarks']  	   = $remarks;
        $data['created_at']    = $this->rcdate;

        $query = DB::table('tbl_country_list')->insert($data);

        if($query){
            Session::put('success','Congratulations, Country added sucessfully !!');
            return Redirect::to('addCountry');
        }else{
            Session::put('failed','Alas !! Error occured, try again.');
            return Redirect::to('addCountry');
        }
    }

// function for manage country for admin
	public function manageCountry()
	 {
	 	$result = DB::table('tbl_country_list')->get();
	 	return view('country.manageCountry')->with('result',$result);
	 }

// function for edit country
    public function editCountry($id)
    {
        $row = DB::table('tbl_country_list')->where('id',$id)->first();
        return view('country.editCountry')->with('row',$row);
    }

// function for update country info
    public function UpdateCountryInfo(Request $request)
     {
        // Validation
        $this->validate($request, [
        'countryName' => 'required',
        ]);

        //Collecting data from html form
        $countryName = trim($request->countryName);
        $remarks     = trim($request->remarks);
        $id          = trim($request->id);

        //Check duplicatet entry
        $count = DB::table('tbl_country_list')
        ->where('country_name', $countryName)
        ->whereNotIn('id',[$id])
        ->count();

        if($count > 0){
            Session::put('failed','Sorry ! '.$countryName. ' Country Already Exits. Try to add new Country');
            return Redirect::to('editCountry/'.$id);
            exit();
        }

        $data = array();
        $data['country_name']  = $countryName;
        $data['remarks']       = $remarks;
        $data['modified_at']   = $this->rcdate;

        $query = DB::table('tbl_country_list')->where('id',$id)->update($data);

        if($query){
            Session::put('success','Congratulations, Country Updated sucessfully !!');
            return Redirect::to('manageCountry');
        }else{
            Session::put('failed','Alas !! Error occured, try again.');
            return Redirect::to('manageCountry');
        }


     } 

// function for load contact us page
     public function contact()
     {
         return view('website.contact');
     }

 // function for send contact info by email
     public function sendContactInfoByEmail(Request $request)
     {
        // Validation
        $this->validate($request, [
        'email'     => 'required|email',
        'subject'   => 'required',
        'message'   => 'required',
        ]);

        //Collecting data from html form
        $contact_email       = trim($request->email);
        $contact_subject     = trim($request->subject);
        $contact_message     = trim($request->message);

        $data['title']           = $contact_subject ;
        $data['contact_email']   = $contact_email ;
        $data['contact_message'] = $contact_message ;
 
        Mail::send('email', $data, function($message) {
            $message->to('asianit2019@gmail.com', 'email')->subject('subject');
        });
 
        if (Mail::failures()) {
           //return response()->Fail('Sorry! Please try again latter');
           Session::put('failed','Sorry! Please try again latter');
           return Redirect::to('/');
         }else{
           //return response()->success('Great! Successfully send in your mail');
           Session::put('succes','Thank You! For Contacting Us');
           return Redirect::to('contact');
         }

     }

 // function for forgot password
     public function forgotPassword()
     {
         return view('admin.forgotPassword');
     }

// function for send temporary password
     public function sendForgotPasswordInfo(Request $request)
     {
        // Validation
        $this->validate($request, [
        'emailOrMobile'     => 'required',
        'affiliateId'       => 'required',
        ]);

        //Collecting data from html form
        $emailOrMobile   = trim($request->emailOrMobile);
        $affiliateId     = trim($request->affiliateId);
        $temporary_password = rand(1111,9999) ;

        $data['title']              = 'Temporary Password' ;
        $data['temporary_password'] = $temporary_password ;
 
        Mail::send('passwordEmail', $data, function($message) {
            $message->to($emailOrMobile, 'email')->subject('Temporary Password');
        });
 
        if (Mail::failures()) {
           //return response()->Fail('Sorry! Please try again latter');
           Session::put('failed','Sorry! Please try again latter');
           return Redirect::to('login');
         }else{

            //$data1['password'] = $temporary_password ;
            //DB::table('tbl_affiliates')
                    //    ->where('email',$emailOrMobile)
                    //    ->where('affiliate_id',$affiliateId)->update($data);

           //return response()->success('Great! Successfully send in your mail');
           Session::put('succes','Your Temporary Password Successfully Send Your Email.');
           return Redirect::to('login');
         }


     }

// function for add domain load for admin
     public function addDomain()
     {
         return view('domain.addDomain');
     }

//  function for add domain info
     public function addDomainInfo(Request $request)
     {
        // Validation
        $this->validate($request, [
        'domainName'        => 'required',
        'domainPrice'       => 'required',
        ]);

        //Collecting data from html form
        $domainName      = trim($request->domainName);
        $domainPrice     = trim($request->domainPrice);

        $count = DB::table('tbl_domain')->where('domain_name',$domainName)->count();
        if ($count > 0) {
            Session::put('failed','Sorry! Already Added This Domain');
            return Redirect::to('addDomain');
            exit();
        }

        $data = array();
        $data['domain_name']        = $domainName;
        $data['domain_price']       = $domainPrice;
        $data['domain_status']      = 1;
        $data['created_at']         = $this->rcdate;

        $query = DB::table('tbl_domain')->insert($data);

        if($query){
            Session::put('success','Congratulations, Domain added sucessfully !!');
            return Redirect::to('addDomain');
        }else{
            Session::put('failed','Alas !! Error occured, try again.');
            return Redirect::to('addDomain');
        }

     }

// function for manage domain for admin
     public function manageDomain()
     {
        $result = DB::table('tbl_domain')->get();
        return view('domain.manageDomain')->with('result',$result);
     }
// Function for add number for admin
     public function addNumber()
     {
        $result = DB::table('tbl_country_list')->get();
        return view('number.addNumber')->with('result',$result);
     }

// function for add number info for admin
     public function addNumberInfo(Request $request)
     {
        // Validation
        $this->validate($request, [
        'countryId'          => 'required',
        'mobileNumber'       => 'required',
        ]);

        //Collecting data from html form
        $countryId        = trim($request->countryId);
        $mobileNumber     = trim($request->mobileNumber);

        $count = DB::table('tbl_pay_per_call')->where('country_id',$countryId)
                    ->where('mobile_number',$mobileNumber)
                    ->count();
        if ($count > 0) {
            Session::put('failed','Sorry! Already Added This Number');
            return Redirect::to('addNumber');
            exit();
        }

        $data = array();
        $data['country_id']          = $countryId;
        $data['mobile_number']       = $mobileNumber;
        $data['created_at']          = $this->rcdate;

        $query = DB::table('tbl_pay_per_call')->insert($data);

        if($query){
            Session::put('success','Congratulations, Number added sucessfully !!');
            return Redirect::to('addNumber');
        }else{
            Session::put('failed','Alas !! Error occured, try again.');
            return Redirect::to('addNumber');
        }

     }

// function for manage number
     public function manageNumber()
     {
        $result = DB::table('tbl_pay_per_call')
                ->join('tbl_country_list','tbl_country_list.id','=','tbl_pay_per_call.country_id')
                ->select('tbl_pay_per_call.*','tbl_country_list.country_name')
                ->get();
        return view('number.manageNumber')->with('result',$result);
     }


// function for domain buy
     public function buyDomain()
     {
        $result = DB::table('tbl_domain')->where('domain_status',1)->get();
        return view('domain.buyDomain')->with('result',$result);
     }
// function for apply request for buydomain
     public function applyRequestForBuyDomain($id)
     {
        $affiliateId   = Session::get('affiliate_id') ;
        $domain_status = '2' ;

        $data1 = array();
        $data1['affiliate_id']   = $affiliateId ;
        $data1['domain_id']      = $id ;
        $data1['domain_status']  = $domain_status ;
        $data1['created_at']     = $this->rcdate ;
        DB::table('tbl_buy_domain_history')->insert($data1);

        $data = array();
        $data['domain_status'] = '2' ;
        $query = DB::table('tbl_domain')->where('id',$id)->update($data);
        if ($query) {
            Session::put('success','Congratulations, You Have Successfully Applied For This Domain !!');
            return Redirect::to('buyDomain');
        }else{
            Session::put('failed','Alas !! Error occured, try again.');
            return Redirect::to('buyDomain');
        }
     }

// function for applied domain list
     public function appliedDomainList()
     {
        $result = DB::table('tbl_domain')->where('domain_status',2)->get();
        return view('domain.appliedDomainList')->with('result',$result);
     }

// function for accept domain buy request
     public function acceptBuyDomainRequest($id)
     {
        $data1 = array();
        $data1['domain_id']      = $id ;
        $data1['domain_status']  = '3' ;
        $data1['created_at']     = $this->rcdate ;
        DB::table('tbl_buy_domain_history')->where('domain_id',$id)->update($data1);

        $data = array();
        $data['domain_status']   = '3' ;
        $query = DB::table('tbl_domain')->where('id',$id)->update($data);
        if ($query) {
            Session::put('success','Congratulations, Domain Buy Request Accepted !!');
            return Redirect::to('appliedDomainList');
        }else{
            Session::put('failed','Alas !! Error occured, try again.');
            return Redirect::to('appliedDomainList');
        }
     }

// function for accept domain buy request
     public function rejectBuyDomainRequest($id)
     {
        $data1 = array();
        $data1['domain_id']      = $id ;
        $data1['domain_status']  = '4' ;
        $data1['created_at']     = $this->rcdate ;
        DB::table('tbl_buy_domain_history')->where('domain_id',$id)->update($data1);

        $data = array();
        $data['domain_status'] = '1' ;
        $query = DB::table('tbl_domain')->where('id',$id)->update($data);
        if ($query) {
            Session::put('success','Congratulations, Domain Buy Request Rejected !!');
            return Redirect::to('appliedDomainList');
        }else{
            Session::put('failed','Alas !! Error occured, try again.');
            return Redirect::to('appliedDomainList');
        }
     }

// function for domain accept list 
     public function domainAcceptList()
     {
        $result = DB::table('tbl_buy_domain_history')
                    ->join('tbl_domain','tbl_domain.id','=','tbl_buy_domain_history.domain_id')
                    ->select('tbl_buy_domain_history.*','tbl_domain.*')
                    ->where('tbl_buy_domain_history.domain_status',3)->get();
        return view('domain.domainAcceptList')->with('result',$result);
     }

// function for domain reject list 
     public function domainRejectList()
     {
        $result = DB::table('tbl_buy_domain_history')
                    ->join('tbl_domain','tbl_domain.id','=','tbl_buy_domain_history.domain_id')
                    ->select('tbl_buy_domain_history.*','tbl_domain.*')
                    ->where('tbl_buy_domain_history.domain_status',4)->get();
        return view('domain.domainRejectList')->with('result',$result);
     }



} // end of controller
