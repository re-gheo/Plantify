<?php

// use Illuminate\Support\Facades\Request;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use function GuzzleHttp\Promise\all;

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

/*Route from login to register after clicking link below form */

Route::get('/retailer/register', function () {
    return view('retailer/register');
});

/*Post request to submit email of already registered account */

Route::post('/retailer/login', function (Request $request) {
    dd($request->all());
});






Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// SOCIAL LOGIN ---------------------------------------------------------------------------------------------
Route::get('login/facebook', 'Auth\LoginController@redirectToFacebook')->name('login.facebook');
Route::get('login/facebook/callback', 'Auth\LoginController@handleFacebookCallback');

Route::get('login/google', 'Auth\LoginController@redirectToGoogle')->name('login.google');
Route::get('login/google/callback', 'Auth\LoginController@handleGoogleCallback');

// Auth::routes();
// Routes::get('/admin/home', 'AdminController@index')->name('admin')->middleware('admin');
// Routes::get('/customer/home', 'CustomerController@index')->name('customer')->middleware('customer');
// Routes::get('/retailer/home', 'RetailerController@index')->name('retailer')->middleware('retailer');