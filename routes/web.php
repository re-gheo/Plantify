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
use Luigel\Paymongo\Facades\Paymongo;

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






Route::get('/', 'StorefrontController@front');

Route::get('/test2', function () {

    $cars = array( 'key1' => "Volvo", "BMW", "Toyota");
    $cars2 = json_encode($cars);
    dd( json_decode($cars2)->key1,  json_encode($cars));
});

//                                          ██╗       
//  █████╗ ██╗   ██╗████████╗██╗  ██╗       ██╗      ██╗      ██████╗  ██████╗ ██╗███╗   ██╗
// ██╔══██╗██║   ██║╚══██╔══╝██║  ██║       ██╗      ██║     ██╔═══██╗██╔════╝ ██║████╗  ██║
// ███████║██║   ██║   ██║   ███████║       ██╗      ██║     ██║   ██║██║  ███╗██║██╔██╗ ██║
// ██╔══██║██║   ██║   ██║   ██╔══██║       ██╗      ██║     ██║   ██║██║   ██║██║██║╚██╗██║
// ██║  ██║╚██████╔╝   ██║   ██║  ██║       ██╗      ███████╗╚██████╔╝╚██████╔╝██║██║ ╚████║
// ╚═╝  ╚═╝ ╚═════╝    ╚═╝   ╚═╝  ╚═╝       ██╗      ╚══════╝ ╚═════╝  ╚═════╝ ╚═╝╚═╝  ╚═══╝
//                                          ██╗  

Auth::routes();
//basic user additiona creds
Route::get('/homes', 'HomeController@index');
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






//  █████╗ ██████╗ ███╗   ███╗██╗███╗   ██╗
// ██╔══██╗██╔══██╗████╗ ████║██║████╗  ██║
// ███████║██║  ██║██╔████╔██║██║██╔██╗ ██║
// ██╔══██║██║  ██║██║╚██╔╝██║██║██║╚██╗██║
// ██║  ██║██████╔╝██║ ╚═╝ ██║██║██║ ╚████║
// ╚═╝  ╚═╝╚═════╝ ╚═╝     ╚═╝╚═╝╚═╝  ╚═══╝




//ADMIN/user managment
Route::get('admin/account-management', 'UserController@index');/*->middleware('admin')*/;

//ADMIN/ CATEGORY
Route::get('/admin/categories', 'CategorieController@index');/*->middleware('admin')*/;
Route::post('/admin/categories/create', 'CategorieController@store');
Route::put('/admin/categories/update/{id}', 'CategorieController@update');
Route::delete('/admin/categories/delete/{id}', 'CategorieController@destroy');

//ADMIN/ KEYWORD 
Route::get('/admin/keyword', 'KeywordController@index');/*->middleware('admin')*/;
Route::post('/admin/keyword/create', 'KeywordController@store');
Route::put('/admin/keyword/update/{id}', 'KeywordController@update');
Route::delete('/admin/keyword/delete/{id}', 'KeywordController@destroy');

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

//ADMIN/ COMMISSIONS
Route::get('/admin/commissions', 'CommissionsController@index');
Route::get('/admin/commissions/create', 'CommissionsController@create');
Route::post('/admin/commissions/store', 'CommissionsController@store');
Route::put('/admin/commissions/{id}/edit', 'CommissionsController@update');
Route::put('/admin/commissions/{id}/put', 'CommissionsController@destroy');


// ██████╗ ██╗   ██╗███████╗████████╗ ██████╗ ███╗   ███╗███████╗██████╗ 
// ██╔═══╝ ██║   ██║██╔════╝╚══██╔══╝██╔═══██╗████╗ ████║██╔════╝██╔══██╗
// ██║     ██║   ██║███████╗   ██║   ██║   ██║██╔████╔██║█████╗  ██████╔╝
// ██║     ██║   ██║╚════██║   ██║   ██║   ██║██║╚██╔╝██║██╔══╝  ██╔══██╗
// ╚██████╗╚██████╔╝███████║   ██║   ╚██████╔╝██║ ╚═╝ ██║███████╗██║  ██║
//  ╚═════╝ ╚═════╝ ╚══════╝   ╚═╝    ╚═════╝ ╚═╝     ╚═╝╚══════╝╚═╝  ╚═╝








//Customer / PRODUCTS
Route::get('/store/item/{id}', 'ProductController@showCustomer');

// CUSTOMER / CART
Route::get('/store/cart', 'ProductController@getmycart');
Route::post('/store/cart/addtocart/{id}', 'ProductController@addtocart1');
Route::delete('/store/cart/remove/{id}', 'ProductController@removecartitem');
Route::put('/store/cart/quantity/{id}', 'ProductController@updatequantity');


// CUSTOMER / CART / CHECKOUT
Route::get('/store/checkout', 'OrderController@checkoutpage');
Route::post('/store/itemcheckout', 'OrderController@addtocheckout');
Route::post('/store/itemcheckout/order', 'OrderController@placeorder');



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
//CUSTOMER/ SETTINGS / PROFILE / add payment method
Route::get('/store/profile/addpayment',  'CardController@register');
Route::post('/store/profile/addpayment/register',  'CardController@addcard');
Route::get('/store/profile/paymentmethods',  'CardController@mycards');
Route::delete('/store/profile/paymentmethods/{id}/delete',  'CardController@remove');



// ██████╗ ███████╗████████╗ █████╗ ██╗██╗     ███████╗██████╗ 
// ██╔══██╗██╔════╝╚══██╔══╝██╔══██╗██║██║     ██╔════╝██╔══██╗
// ██████╔╝█████╗     ██║   ███████║██║██║     █████╗  ██████╔╝
// ██╔══██╗██╔══╝     ██║   ██╔══██║██║██║     ██╔══╝  ██╔══██╗
// ██║  ██║███████╗   ██║   ██║  ██║██║███████╗███████╗██║  ██║
// ╚═╝  ╚═╝╚══════╝   ╚═╝   ╚═╝  ╚═╝╚═╝╚══════╝╚══════╝╚═╝  ╚═╝

Route::get('/test7', function (Request $request) {

    $retrievedsource = Paymongo::paymentIntent()->find('pi_deUPJz3ni8HbwRQfFw5SoQMU');
    dd($retrievedsource);
});





// RETAILER/ STORE
Route::get('/store', 'StoreController@front');
Route::put('/store/setup', 'StoreController@setupstore');
Route::get('/store/customize', 'StoreController@edit');
Route::put('/store/customize', 'StoreController@update');

// RETAILER/ Products
Route::get('/store/products', 'ProductController@list');
Route::get('/store/products/create/{type}', 'ProductController@create');
Route::post('/store/products/store', 'ProductController@store');
Route::get('/store/products/{id}', 'ProductController@show');
Route::get('/store/products/{id}/edit', 'ProductController@edit');
Route::put('/store/products/{id}/edit', 'ProductController@update');
Route::get('/store/products/{id}/removepic/{pic}', 'ProductController@removepicture');
Route::get('/store/products/{id}/remove', 'ProductController@remove');


// Articles
Route::resource('/articles', 'ArticleController');

// Notifications
// Route::get('/send-notification', [NotificationController::class, 'sendNotification']);













// Route::get('/test', function () {
//     $mytime = Carbon::now();
//     echo $mytime->toDateString();
//     $date = CarbonImmutable::now();
//     //dd('time is '  .$date);
//     //dd(User::where('email',Auth::user()->email)->first());

//     $mutable = Carbon::now();
//     $immutable = CarbonImmutable::now();
//     $modifiedMutable = $mutable->add(1, 'day');
//     $modifiedImmutable = CarbonImmutable::now()->add(1, 'day');
//     dd('time im ' .  $immutable);
//     var_dump($modifiedMutable === $mutable);             // bool(true)
//     var_dump($mutable->isoFormat('dddd D'));             // string(12) "Wednesday 10"
//     var_dump($modifiedMutable->isoFormat('dddd D'));     // string(12) "Wednesday 10"
//     // So it means $mutable and $modifiedMutable are the same object
//     // both set to now + 1 day.
//     var_dump($modifiedImmutable === $immutable);         // bool(false)
//     var_dump($immutable->isoFormat('dddd D'));           // string(9) "Tuesday 9"
//     var_dump($modifiedImmutable->isoFormat('dddd D'));   // string(12) "Wednesday 10"
//     // While $immutable is still set to now and cannot be changed and
//     // $modifiedImmutable is a new instance created from $immutable
//     // set to now + 1 day.

//     $mutable = CarbonImmutable::now()->toMutable();
//     var_dump($mutable->isMutable());                     // bool(true)
//     var_dump($mutable->isImmutable());                   // bool(false)
//     $immutable = Carbon::now()->toImmutable();
//     var_dump($immutable->isMutable());                   // bool(false)
//     var_dump($immutable->isImmutable());                 // bool(true)

// });
