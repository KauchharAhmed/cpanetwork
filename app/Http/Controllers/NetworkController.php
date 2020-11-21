<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\BrowserDetect;
use App\Http\Requests;
use DB;
use Session;
use Jenssegers\Agent\Agent;

class NetworkController extends Controller
{

    // My Own Offer Redirecting to imonetize offer's page
    public function aff_c(Request $request)
    {
    	$offer = trim($request->offer);
    	$pub = trim($request->pub);
		//$user_ip = $request->ip();
		// $user_ip = '27.147.176.155';

		// $geo = unserialize(file_get_contents("http://www.geoplugin.net/php.gp?ip=$user_ip"));

		// $city = $geo["geoplugin_city"];
		// $region = $geo["geoplugin_regionName"];
		// $country = $geo["geoplugin_countryName"];
		// $division = $geo["geoplugin_region"];
		// $geoplugin_latitude = $geo["geoplugin_latitude"];
		// $geoplugin_longitude = $geo["geoplugin_longitude"];

		$agent = new Agent();
		$platform = $agent->platform();
		$ver = $agent->version($platform);
		$device = $agent->device();
		$browser = $agent->browser();

    	return $browser;
    }

    public function postback(Request $request)
    {
		$clickid = trim($request->clickid);
		$revenue = trim($request->revenue);
		$aff_id  = trim($request->aff_id);

		return $clickid;
    }

}
