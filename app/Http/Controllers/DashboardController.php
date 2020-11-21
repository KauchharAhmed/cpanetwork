<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests;
use DB;
use Session;

class DashboardController extends Controller
{
     /**
     * Dashboardd CLASS costructor 
     *
     */
    public function __construct()
    {
    	date_default_timezone_set('Asia/Dhaka');
    	$this->rcdate       = date('Y-m-d');
        $this->loged_id     = Session::get('admin_id');
        $this->current_time = date("H:i:s");
        $this->branch_id    = Session::get('branch_id');
    }

    /**
     * After login successull admin enter into stystem
     * @return \Illuminate\Http\Response
     */
    
    public function adminDashboard()
    {
        return view('admin.adminDashboard');
    }

    /**
     * After login successull admin enter into stystem
     * @return \Illuminate\Http\Response
     */
    
    public function affiliateDashboard()
    {
        return view('admin.affiliateDashboard');
    }

}
