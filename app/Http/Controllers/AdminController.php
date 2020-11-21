<?php

namespace App\Http\Controllers; 

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests;
use DB;
use Session;

class AdminController extends Controller
{
    private $rcdate ;
    private $loged_id ;
    private $current_time ;

    public function __construct()
    {
        date_default_timezone_set('Asia/Dhaka');
        $this->rcdate = date('Y-m-d');
        $this->loged_id     = Session::get('admin_id');
        $this->current_time = date('H:i:s');
    }

    public function index()
    {
        return view('admin.index');
    }

    public function accessPermission(Request $request)
    {
        // Form validation
        $this->validate($request, [
        'mobile'    => 'required',
        'password'  => 'required',
        ]);

        // Collecting data from html form
        $mobile    = trim($request->mobile);
        $pwd       = trim($request->password);
        $salt      = 'a123A321';
        $password  = sha1($pwd.$salt);

        // Query for matching the provided data whether information found or not
        $count = DB::table('admin')
        ->where('mobile', $mobile)
        ->where('password', $password)
        ->where('status',1)
        ->count();

        // if query get some match then retrieve the first row data
        if($count > 0){
            $admin_login = DB::table('admin')
            ->where('mobile', $mobile)
            ->where('password', $password)
            ->where('status',1)
            ->first();

            // checking user type
            $type = $admin_login->type;

            if($type == '1'){
                // Storing data in session variable, 1 means admin
                Session::put('admin_name',$admin_login->name);
                Session::put('admin_id',$admin_login->id);
                Session::put('type',$admin_login->type);
                Session::put('photo',$admin_login->image);
                return Redirect::to('/adminDashboard');
            }else if($type == '2'){
                // Storing data in session variable, 2 means manager
                Session::put('admin_name',$admin_login->name);
                Session::put('admin_id',$admin_login->id);
                Session::put('type',$admin_login->type);
                Session::put('photo',$admin_login->image);
                return Redirect::to('/supplierDashboard');
            }else if($type == '3'){
                // Storing data in session variable, 2 means manager
                Session::put('admin_name',$admin_login->name);
                Session::put('admin_id',$admin_login->id);
                Session::put('type',$admin_login->type);
                Session::put('photo',$admin_login->image);
                return Redirect::to('/buyerDashboard');                
            }else{
                // Storing data in session variable, 2 means manager
                Session::put('admin_name',$admin_login->name);
                Session::put('admin_id',$admin_login->id);
                Session::put('type',$admin_login->type);
                Session::put('photo',$admin_login->image);
                return Redirect::to('/premiumSupplierDashboard');   
            }

        }else{
            Session::put('login_faild','<b>Wrong information provided. Try again !!</b>');
            return Redirect::to('/apanel');
        }
    }

    // END OF ADMIN LOGIN PROCESS


    /**
     * super admin logout process 
     * @return \Illuminate\Http\Response
     */
    public function adminLogout()
    {
        Session::put('admin_id',null);
        Session::put('type',null);
        return Redirect::to('apanel');
    }


    #-------------------------- Web Login Process --------------------#
    public function webLoginProcess(Request $request)
    {
        // Form validation
        $this->validate($request, [
        'email'    => 'required',
        'password'  => 'required',
        ]);


        // Collecting data from html form
        $email     = trim($request->email);
        $pwd       = trim($request->password);
        $salt      = 'a123A321';
        $password  = sha1($pwd.$salt);

        // Query for matching the provided data whether information found or not
        $count = DB::table('tbl_affiliates')
        ->where('email', $email)
        ->where('password', $password)
        ->count();

        // if query get some match then retrieve the first row data
        if($count > 0){

            $affiliate_login = DB::table('tbl_affiliates')
            ->where('email', $email)
            ->where('password', $password)
            ->first();

                // Storing data in session variable, 2 means manager
                Session::put('admin_name',$affiliate_login->first_name);
                Session::put('affliate_login_id',$affiliate_login->id);
                Session::put('affiliate_id',$affiliate_login->affiliate_id);
                //Session::put('photo',$affiliate_login->image);
                return Redirect::to('/affiliateDashboard');                

        }else{
            Session::put('login_faild','<b>Wrong information provided. Try again !!</b>');
            return Redirect::to('/login');
        }
    }

// function for registration
    public function registration()
    {
        return view('admin.registration');
    }

// function for save registration info
    public function saveRegistrationInfo(Request $request)
    {
        // Validation
        $this->validate($request, [
        'firstName'         => 'required',
        'lastName'          => 'required',
        'email'             => 'required',
        'password'          => 'required',
        'phone'             => 'required',
        'skype'             => 'required',
        'traffic_type'      => 'required',
        'traffic_volume'    => 'required',
        'how_you_know_us'   => 'required',
        ]);

        //Collecting data from html form
        $firstName              = trim($request->firstName);
        $lastName               = trim($request->lastName);
        $email                  = trim($request->email);
        $pwd                    = trim($request->password);
        $salt                   = 'a123A321';
        $password               = sha1($pwd.$salt);
        $phone                  = trim($request->phone);
        $skype                  = trim($request->skype);
        $traffic_type           = trim($request->traffic_type);
        $traffic_volume         = trim($request->traffic_volume);
        $how_you_know_us        = trim($request->how_you_know_us);
        $refference_id          = trim($request->refference_id);
        $affiliate_id           = rand(7586,1234);

        $count = DB::table('tbl_affiliates')
                ->where('first_name',$firstName)
                ->where('last_name',$lastName)
                ->where('email',$email)
                ->where('password',$password)
                ->where('phone',$phone)
                ->where('skype',$skype)
                ->where('traffic_type',$traffic_type)
                ->where('traffic_volume',$traffic_volume)
                ->where('how_you_know_us',$how_you_know_us)
                ->count();

        if ($count > 0) {
            Session::put('failed','Sorry ! Affliates Already Exits. Try to add New');
            return Redirect::to('registration');
            exit();
        }

        // insert into affiliates table
        $data = array();
        $data['first_name']       = $firstName;
        $data['last_name']        = $lastName;
        $data['email']            = $email;
        $data['password']         = $password;
        $data['phone']            = $phone;
        $data['skype']            = $skype;
        $data['traffic_type']     = $traffic_type;
        $data['traffic_volume']   = $traffic_volume;
        $data['how_you_know_us']  = $how_you_know_us;
        $data['refference_id']    = $refference_id;
        $data['affiliate_id']     = $affiliate_id;
        $data['created_at']       = $this->rcdate;

        DB::table('tbl_affiliates')->insert($data);

        // insert into balance table

        $data = array();
        $data['affiliate_id'] = $affiliate_id;
        $data['balance']      = 0.00;

        $query = DB::table('tbl_balance')->insert($data);
        if($query){
            Session::put('success','Congratulations, You Are Successfully Registered & Your ID is'. $affiliate_id);
            return Redirect::to('registration');
        }else{
            Session::put('failed','Alas !! Error occured, try again.');
            return Redirect::to('registration');
        }

    }

// function for login
    public function login()
    {
        return view('admin/login');
    }

// function for affiliate logout
    public function affiliateLogout()
    {
        Session::put('admin_id',null);
        return Redirect::to('/');
    }

#------------------------------- ADMIN PASSWORD CHANGE------------------------#
    // admin password change
    public function adminChangePassword()
    {
        return view('admin.adminChangePassword');
    }
    // admin password change 
    public function adminChangePasswordInfo(Request $request)
    {
     $this->validate($request, [
    'old_password'              => 'required',
    'new_password'              => 'required',
    'confirm_new_password'      => 'required'
    ]);
     $salt                 = 'a123A321';
     $old_password         = trim($request->old_password);
     $new_password         = trim($request->new_password);
     $confirm_new_password = trim($request->confirm_new_password);
     $id                   = trim($request->id);
     $salt_old_password    = sha1($old_password.$salt);
     $change_password      = sha1($new_password.$salt);

     // check old password
     $check_old_password_query = DB::table('admin')->where('id',$id)->where('password',$salt_old_password)->count();
     if($check_old_password_query == '0'){
        // Old password does not match
        Session::put('failed','Sorry ! Your old Password Did Not Match. Try Again');
        return Redirect::to('adminChangePassword');  
        exit();
     } 

     // new password and confirm new password matcho
     if($new_password != $confirm_new_password){
        Session::put('failed','Sorry !New password And Confirm New Password Did Not Match. Try Again');
        return Redirect::to('adminChangePassword');  
        exit();
     }

     // insert password change history
    $data = array();
    $data['admin_id']       = $id ;
    $data['password']       = $change_password ;
    $data['recover_code']   = '' ;
    $data['type']           = 1 ;
    $data['status']         = 1 ;
    $data['created_time']   = $this->current_time ;
    $data['created_at']     = $this->rcdate ;
    DB::table('tbl_password_change_history')->insert($data);

    // change the password
    $data1 = array();
    $data1['password'] = $change_password ;
    $query = DB::table('admin')->where('id',$id)->update($data1);

    if($query){
        Session::put('admin_id',null);
        Session::put('type',null);
        Session::put('password_change','Password Change Sucessfully'); 
        return Redirect::to('apanel');
    }else{
        Session::put('failed','Sorry !Error Occured. Try Again');
        return Redirect::to('adminChangePassword');
    }
    }
  #----------------------------- END ADMIN PASSWORD CHANGE-----------------------#

  #------------------------------- AFFILIATE PASSWORD CHANGE------------------------#
    // admin password change
    public function userChangePassword()
    {
        return view('admin.userChangePassword');
    }
    // admin password change 
    public function userChangePasswordInfo(Request $request)
    {
     $this->validate($request, [
    'old_password'              => 'required',
    'new_password'              => 'required',
    'confirm_new_password'      => 'required'
    ]);
     $salt                 = 'a123A321';
     $old_password         = trim($request->old_password);
     $new_password         = trim($request->new_password);
     $confirm_new_password = trim($request->confirm_new_password);
     $id                   = trim($request->id);
     $salt_old_password    = sha1($old_password.$salt);
     $change_password      = sha1($new_password.$salt);

     // check old password
     $check_old_password_query = DB::table('tbl_affiliates')->where('id',$id)->where('password',$salt_old_password)->count();
     if($check_old_password_query == '0'){
        // Old password does not match
        Session::put('failed','Sorry ! Your old Password Did Not Match. Try Again');
        return Redirect::to('userChangePassword');  
        exit();
     } 

     // new password and confirm new password matcho
     if($new_password != $confirm_new_password){
        Session::put('failed','Sorry !New password And Confirm New Password Did Not Match. Try Again');
        return Redirect::to('userChangePassword');  
        exit();
     }

     // insert password change history
    $data = array();
    $data['admin_id']       = $id ;
    $data['password']       = $change_password ;
    $data['recover_code']   = '' ;
    $data['type']           = 2 ;
    $data['status']         = 1 ;
    $data['created_time']   = $this->current_time ;
    $data['created_at']     = $this->rcdate ;
    DB::table('tbl_password_change_history')->insert($data);

    // change the password
    $data1 = array();
    $data1['password'] = $change_password ;
    $query = DB::table('tbl_affiliates')->where('id',$id)->update($data1);

    if($query){
        Session::put('affliate_login_id',null);
        Session::put('succes','Password Change Sucessfully'); 
        return Redirect::to('login');
    }else{
        Session::put('failed','Sorry !Error Occured. Try Again');
        return Redirect::to('userChangePassword');
    }
    }
  #----------------------------- END AFFILIATE PASSWORD CHANGE-----------------------#






}// end bracket