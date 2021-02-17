<?php

// use Illuminate\Support\Facades\Request;

use Carbon\Carbon;
use App\Models\User;
use Carbon\CarbonImmutable;
use function Ramsey\Uuid\v1;
use Illuminate\Http\Request;
use function GuzzleHttp\Promise\all;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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
       
        return view('storefront');
    });

    Route::get('/test2', function () {
       
        dd(Auth::user()->email);
    });




    Auth::routes();
//basic user additiona creds
    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/setup', 'UserController@setup');
    Route::put('/setup/{email}', 'UserController@setups');
    Route::get('/verify', 'UserController@verify');
    Route::put('/verify', 'UserController@getcode');
// OTP
    Route::get('/verify', 'UserController@verify');
    Route::put('/verify', 'UserController@getcode');
    Route::get('/verify/check', 'UserController@entercode');
    Route::put('/verify/check', 'UserController@checkcode');
    Route::post('/verify/cancel', 'UserController@cancelcode');




// SOCIAL LOGIN ---------------------------------------------------------------------------------------------
    Route::get('/login/facebook', 'Auth\LoginController@redirectToFacebook')->name('login.facebook');
    Route::get('/login/facebook/callback', 'Auth\LoginController@handleFacebookCallback');
    Route::get('/login/google', 'Auth\LoginController@redirectToGoogle')->name('login.google');
    Route::get('/login/google/callback', 'Auth\LoginController@handleGoogleCallback');
//basic login
    Route::get('/admin/home', 'AdminController@index')->name('admin.home')->middleware('admin');
    Route::get('/customer/home', 'CustomerController@index')->name('customer.home')->middleware('customer');
    Route::get('/retailer/home', 'RetailerController@index')->name('retailer.home')->middleware('retailer');
    Route::get('/restricted', 'HomeController@restricted')->middleware(['role']);






//ADMIN part
//ADMIN/user managment
    Route::get('admin/account-management', 'UserController@index');/*->middleware('admin')*/;

//ADMIN/ category -- done 
    Route::get('/admin/categories', 'CategorieController@index');/*->middleware('admin')*/;
    Route::post('/admin/categories/create', 'CategorieController@store');
    Route::put('/admin/categories/update/{id}', 'CategorieController@update');
    Route::delete('/admin/categories/delete/{id}', 'CategorieController@destroy');

//ADMIN/ reference page
    Route::get('/admin/plantreference', 'PlantReferencepageController@index');
    Route::get('/admin/plantreference/create', 'PlantReferencepageController@create');
    Route::post('/admin/plantreference/store', 'PlantReferencepageController@store');
    Route::get('/admin/plantreference/{id}', 'PlantReferencepageController@edit');
    Route::put('/admin/plantreference/{id}/edit', 'PlantReferencepageController@update');
    Route::delete('/admin/plantreference/{id}/delete', 'PlantReferencepageController@destroy');
    Route::get('/admin/plantreference/{id}/removepic/{num}', 'PlantReferencepageController@removepic');

//ADMIN/ APPLICATIONS CHECKING
    Route::get('/admin/customer_application/', 'RetailerApplicationController@index');
    Route::get('/admin/customer_application/{id}', 'RetailerApplicationController@show');
    Route::put('/admin/customer_application/approve/{id}', 'RetailerApplicationController@approve');
    Route::put('/admin/customer_application/deny/{id}', 'RetailerApplicationController@deny');



//CUSTOMER/ SETTINGS / APPLICATIONS
    Route::get('/settings/application/form', 'RetailerApplicationController@form');
    Route::post('/settings/application/form', 'RetailerApplicationController@send');

//CUSTOMER/ SETTINGS / PROFILE 
    Route::get('/settings/profile', 'UserController@profile');
    //CUSTOMER/ SETTINGS / PROFILE / SETUP  if user skip register setUp
        Route::get('/settings/profile/edit', 'UserController@editprofile');
        Route::put('/settings/profile/update', 'UserController@updateprofile');
    //CUSTOMER/ SETTINGS / PROFILE / VERIFY - OTP if user skip OTP
            Route::get('/settings/profile/verify', 'UserController@pverify');
            Route::put('/settings/profile/verify', 'UserController@pgetcode');
            Route::get('/settings/profile/verify/check', 'UserController@pentercode');
            Route::put('/settings/profile/verify/check', 'UserController@pcheckcode');
            Route::put('/settings/profile/verify/cancel', 'UserController@pcancelcode');






 // RETAILER/ STORE
    Route::get('/settings/store/', 'StoreController@front');
    Route::put('/settings/store/setup', 'StoreController@setupstore');
    Route::get('/settings/store/customize', 'StoreController@edit');
    Route::put('/settings/store/customize', 'StoreController@update');
    // Route::put('/settings/store/customize', 'StoreController@form');

    
    Route::resource('articles', 'ArticleController');













Route::get('/test', function(){
    $date = CarbonImmutable::now();
    // dd('time is '  .$dat);
    //dd(User::where('email',Auth::user()->email)->first());

    $mutable = Carbon::now();
$immutable = CarbonImmutable::now();
$modifiedMutable = $mutable->add(1, 'day');
$modifiedImmutable = CarbonImmutable::now()->add(1, 'day');
var_dump('time im ' .  $immutable . ' muta '.  $date);
var_dump($modifiedMutable === $mutable);             // bool(true)
var_dump($mutable->isoFormat('dddd D'));             // string(12) "Wednesday 10"
var_dump($modifiedMutable->isoFormat('dddd D'));     // string(12) "Wednesday 10"
// So it means $mutable and $modifiedMutable are the same object
// both set to now + 1 day.
var_dump($modifiedImmutable === $immutable);         // bool(false)
var_dump($immutable->isoFormat('dddd D'));           // string(9) "Tuesday 9"
var_dump($modifiedImmutable->isoFormat('dddd D'));   // string(12) "Wednesday 10"
// While $immutable is still set to now and cannot be changed and
// $modifiedImmutable is a new instance created from $immutable
// set to now + 1 day.

$mutable = CarbonImmutable::now()->toMutable();
var_dump($mutable->isMutable());                     // bool(true)
var_dump($mutable->isImmutable());                   // bool(false)
$immutable = Carbon::now()->toImmutable();
var_dump($immutable->isMutable());                   // bool(false)
var_dump($immutable->isImmutable());                 // bool(true)

});