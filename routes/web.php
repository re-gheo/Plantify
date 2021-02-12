<?php

// use Illuminate\Support\Facades\Request;

use App\Models\User;
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



/*Route to open Login page upon Artisan Serve */
    Route::get('/', function () {
        return view('retailer/storefront');
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



//CUSTOMER/ SETTINGS / APPLICATIONS
    Route::get('/application/form', function(){});

//CUSTOMER/ SETTINGS / PROFILE 
    Route::get('/settings/profile', 'UserController@profile');
    //CUSTOMER/ SETTINGS / PROFILE / SETUP & VERIFY
        Route::get('/settings/profile/edit', 'UserController@editprofile');
        Route::put('/settings/profile/update', 'UserController@updateprofile');
        Route::get('/verify', 'UserController@verify');
    // Route::put('/verify', 'UserController@getcode');
    // Route::get('/verify/check', 'UserController@entercode');
    // Route::put('/verify/check', 'UserController@checkcode');
    // Route::put('/verify/cancel', 'UserController@cancelcode');



    // Route::get('/retailer/products', function (){
    //     $references = DB::table('plant_referencepages')
    //     ->leftJoin('categories', 'plant_referencepages.plant_categoryid' , '=' , 'categories.product_categoryid') ->get();
    //     $products =  DB::table('products')
    //     ->leftJoin('categories', 'products.product_categoryid', '=' , 'categories.product_categoryid');
        
    //     dd($reference);


    // });
    Route::resource('articles', 'ArticleController');













Route::get('/test', function(){
    //dd(User::where('email',Auth::user()->email)->first());
});