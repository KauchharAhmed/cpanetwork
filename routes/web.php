<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('index');
});

#----------------------- ADMIN ---------------------------#
//Route::get('/','AdminController@website');
Route::get('/apanel','AdminController@index');
Route::post('/loginProcess','AdminController@accessPermission');
Route::get('/adminDashboard','DashboardController@adminDashboard');
Route::get('/adminLogout','AdminController@adminLogout');

// registration
Route::get('/registration','AdminController@registration');
Route::post('/saveRegistrationInfo','AdminController@saveRegistrationInfo');
//  affiliate login
Route::get('/login','AdminController@login');
Route::post('/webLoginProcess','AdminController@webLoginProcess');
// affiliate logout
Route::get('/affiliateLogout','AdminController@affiliateLogout');
// affliate dashboard
Route::get('/affiliateDashboard','DashboardController@affiliateDashboard');
// admin change password
Route::get('/adminChangePassword','AdminController@adminChangePassword');
Route::post('/adminChangePasswordInfo','AdminController@adminChangePasswordInfo');
// affiliate change password
Route::get('/userChangePassword','AdminController@userChangePassword');
Route::post('/userChangePasswordInfo','AdminController@userChangePasswordInfo');
#-----------------------------Balance Transfer--------------------------------#
Route::get('/balanceTransfer','BalanceTransferController@balanceTransfer');
Route::post('/balanceTransferToUser','BalanceTransferController@balanceTransferToUser');
Route::get('/manageBalanceTransfer','BalanceTransferController@manageBalanceTransfer');
Route::get('/balanceTransferReport','ReportController@balanceTransferReport');
Route::post('/balanceTransferReportView','ReportController@balanceTransferReportView');
// print
Route::post('/printBalanceTransferReport','PrintController@printBalanceTransferReport');
#-----------------------------------COUNTRY--------------------------------------#
Route::get('/addCountry','UserController@addCountry');
Route::post('/addCountryInfo','UserController@addCountryInfo');
Route::get('/manageCountry','UserController@manageCountry');
Route::get('/editCountry/{id}','UserController@editCountry');
Route::post('/UpdateCountryInfo','UserController@UpdateCountryInfo');
#--------------------------------END COUNTRY--------------------------------------#

#------------------------FORGOT PASSWORD----------------------------------#
//Route::get('/sendEmail','EmailController@sendEmail');
Route::get('/forgotPassword','UserController@forgotPassword');
Route::post('/sendForgotPasswordInfo','UserController@sendForgotPasswordInfo');
#------------------------END FORGOT PASSWORD------------------------------#

#------------------------------Website-------------------------------------#
Route::get('/contact','UserController@contact');
Route::post('/sendContactInfoByEmail','UserController@sendContactInfoByEmail');
#-------------------------------DOMAIN----------------------------------#
Route::get('/addDomain','UserController@addDomain');
Route::post('/addDomainInfo','UserController@addDomainInfo');
Route::get('/manageDomain','UserController@manageDomain');
Route::get('/buyDomain','UserController@buyDomain');
Route::get('/applyRequestForBuyDomain/{id}','UserController@applyRequestForBuyDomain');
Route::get('/appliedDomainList','UserController@appliedDomainList');
Route::get('/acceptBuyDomainRequest/{id}','UserController@acceptBuyDomainRequest');
Route::get('/rejectBuyDomainRequest/{id}','UserController@rejectBuyDomainRequest');
Route::get('/domainAcceptList','UserController@domainAcceptList');
Route::get('/domainRejectList','UserController@domainRejectList');
#-----------------------------END DOMAIN----------------------------------#

#---------------------------------NUMBER----------------------------------#
Route::get('/addNumber','UserController@addNumber');
Route::post('/addNumberInfo','UserController@addNumberInfo');
Route::get('/manageNumber','UserController@manageNumber');
#-------------------------------END NUMBER----------------------------------#

Route::get('/aff_c','NetworkController@aff_c');
Route::get('/postback','NetworkController@postback');