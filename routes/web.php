<?php

// use Illuminate\Support\Facades\Request;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use function GuzzleHttp\Promise\all;
use function Ramsey\Uuid\v1;

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
//basic
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/setup', 'userController@setup');
Route::put('/setup/{email}', 'userController@setups');

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




//admin part
//admin/user managment
Route::get('admin/account-management', 'UserController@index');/*->middleware('admin')*/;

//admin/ category -- done 
Route::get('/admin/categories', 'CategorieController@index');/*->middleware('admin')*/;
Route::post('/admin/categories/create', 'CategorieController@store');
Route::put('/admin/categories/update/{id}', 'CategorieController@update');
Route::delete('/admin/categories/delete/{id}', 'CategorieController@destroy');

//admin/ reference page
Route::get('/admin/plantreference', 'PlantReferencepageController@index');
Route::get('/admin/plantreference/create', 'PlantReferencepageController@create');
Route::post('/admin/plantreference/store', 'PlantReferencepageController@store');
Route::get('/admin/plantreference/{id}', 'PlantReferencepageController@edit');
Route::put('/admin/plantreference/{id}/edit', 'PlantReferencepageController@update');
Route::delete('/admin/plantreference/{id}/delete', 'PlantReferencepageController@destroy');

// Route::post('admin/plantreference/store', function(Request $request){
//     // dd($request->plant_photo,$request->plant_phototwo, $request->plant_photothree);
    
//     $request->plant_photo->store('referecnce_page','public');

//     dd($request->plant_photo->store('referecnce_page','public'));
//     return 'upluad success';
// });


Route::get('admin/categories', 'CategorieController@index')/*->middleware('admin')*/;

Route::resource('articles', 'ArticleController');

