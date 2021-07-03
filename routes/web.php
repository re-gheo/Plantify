<?php

// use Illuminate\Support\Facades\Request;

use Carbon\Carbon;
use App\Models\User;
use Carbon\CarbonImmutable;
use PHPUnit\Framework\Test;
use function Ramsey\Uuid\v1;
use Illuminate\Http\Request;
use App\Classes\Trackingmore;
use App\Services\AdminDataService;
use Illuminate\Support\Facades\URL;
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

Route::get('/mail', function () {
});

Route::get('/exp2', function () {

  $data = new AdminDataService;


  dd($data->getDataAdmin());
  return $data->getDataAdmin();

  // reten view("something")
});

route::resource("/plant-information", "ProductInformationController")->parameters(['plant-information' => 'plant_referencepage']);;
Auth::routes();
//  URL::forceRootUrl('https://isproj2b.benilde.edu.ph/Plantify');
//  URL::forceScheme('https');
Route::get('/login', 'Auth\LoginController@showLoginForm')->name('loginf');
Route::post('/loginsub', 'Auth\LoginController@login')->name('login');
Route::get('/register', 'Auth\RegisterController@showRegistrationForm')->name('registerf');
Route::post('/registersub', 'Auth\RegisterController@register')->name('register');

Route::get('/exp');



Route::get('/', 'StorefrontController@front')->name("store");
Route::get('/store/articles', 'ArticleController@store_show')->name('store.articles');

//RETAILER Comment/Reply
Route::post('/comment/{id}', 'CommentController@store')->name('retailer.reply.store');
Route::put('/comment/{id}/update', 'CommentController@update')->name('retailer.reply.update');

//Customer Reply
Route::post('/product/inquire/{id}', 'InquiryController@store')->name('customer.inquiry.store');
Route::put('/product/inquire/mark/{id}', 'InquiryController@markAsBest')->name('customer.inquiry.best');
Route::delete('/product/inquire/{id}/delete', 'InquiryController@delete')->name('customer.inquiry.delete');


Route::post('/product/rate/{id}', 'ProductRatingController@rate')->name('product.rating.customer');

//                                          ██╗
//  █████╗ ██╗   ██╗████████╗██╗  ██╗       ██╗      ██╗      ██████╗  ██████╗ ██╗███╗   ██╗
// ██╔══██╗██║   ██║╚══██╔══╝██║  ██║       ██╗      ██║     ██╔═══██╗██╔════╝ ██║████╗  ██║
// ███████║██║   ██║   ██║   ███████║       ██╗      ██║     ██║   ██║██║  ███╗██║██╔██╗ ██║
// ██╔══██║██║   ██║   ██║   ██╔══██║       ██╗      ██║     ██║   ██║██║   ██║██║██║╚██╗██║
// ██║  ██║╚██████╔╝   ██║   ██║  ██║       ██╗      ███████╗╚██████╔╝╚██████╔╝██║██║ ╚████║
// ╚═╝  ╚═╝ ╚═════╝    ╚═╝   ╚═╝  ╚═╝       ██╗      ╚══════╝ ╚═════╝  ╚═════╝ ╚═╝╚═╝  ╚═══╝
//                                          ██╗





//basic user additiona creds
Route::get('/homes', 'HomeController@index')->name('addc.homes');
Route::get('/setup', 'UserController@setup')->name('addc.setup');
Route::put('/setup/{email}', 'UserController@setups')->name('addc.setupput');
// OTP
Route::get('/verify', 'UserController@verify')->name('OTP.verify');
Route::put('/verify', 'UserController@getcode')->name('OTP.verifyput');
Route::get('/verify/check', 'UserController@entercode')->name('OTP.verifycheck');
Route::put('/verify/check', 'UserController@checkcode')->name('OTP.verifycheckput');
Route::post('/verify/cancel', 'UserController@cancelcode')->name('OTP.verifycancel');






// SOCIAL LOGIN ---------------------------------------------------------------------------------------------
Route::get('/login/facebook', 'Auth\LoginController@redirectToFacebook')->name('login.facebook');
Route::get('/login/facebook/callback', 'Auth\LoginController@handleFacebookCallback');
Route::get('/login/google', 'Auth\LoginController@redirectToGoogle')->name('login.google');
Route::get('/login/google/callback', 'Auth\LoginController@handleGoogleCallback');
//basic login
Route::get('/admin/home', 'AdminController@index')->name('admin.home')->middleware('admin', 'banned');
Route::get('/customer/home', 'CustomerController@index')->name('customer.home')->middleware('customer');
Route::get('/retailer/home', 'RetailerController@index')->name('retailer.home')->middleware('retailer');
Route::get('/restricted', 'HomeController@restricted')->name('restricted')->middleware(['role']);






//  █████╗ ██████╗ ███╗   ███╗██╗███╗   ██╗
// ██╔══██╗██╔══██╗████╗ ████║██║████╗  ██║
// ███████║██║  ██║██╔████╔██║██║██╔██╗ ██║
// ██╔══██║██║  ██║██║╚██╔╝██║██║██║╚██╗██║
// ██║  ██║██████╔╝██║ ╚═╝ ██║██║██║ ╚████║
// ╚═╝  ╚═╝╚═════╝ ╚═╝     ╚═╝╚═╝╚═╝  ╚═══╝




//ADMIN/user managment
Route::get('admin/account-management', 'UserController@index')->name('admin.user.index');/*->middleware('admin')*/;
Route::post('/admin/user/{id}/ban', 'AdminController@ban')->name('admin.user.ban');
Route::post('/admin/user/{id}/unban', 'AdminController@unban')->name('admin.user.unban');

//ADMIN/crud managment
Route::get('admin/user/admin/list', 'AdminController@index_list')->name('admin.list')/*->middleware('admin')*/;
Route::get('admin/user/admin/{id}/edit', 'AdminController@edit_admin')->name('admin.user.admin.edit')/*->middleware('admin')*/;
Route::post('admin/user/admin/{id}/update', 'AdminController@update')->name('admin.user.admin.update')/*->middleware('admin')*/;
Route::post('admin/user/admin/store', 'AdminController@store')->name('admin.user.admin.store')/*->middleware('admin')*/;
Route::delete('admin/user/admin/{id}/delete', 'AdminController@delete')->name('admin.user.admin.delete')/*->middleware('admin')*/;


//ADMIN/ CATEGORY
Route::resource('/admin/categories', 'CategorieController');

//ADMIN/ KEYWORD
Route::resource('/admin/keyword', 'KeywordController');

//ADMIN/ REFERENCE
Route::get('/admin/plantreference/{id}/removepic/{num}', 'PlantReferencepageController@removepic')->name('reference.removepic');
Route::resource('/admin/plantreference', 'PlantReferencepageController');

//ADMIN/ APPLICATIONS CHECKING
Route::get('/admin/customer_application/', 'RetailerApplicationController@index')->name('admin.customer_application.get');
Route::get('/admin/customer_application/{id}', 'RetailerApplicationController@show')->name('admin.customer_application.show');
Route::put('/admin/customer_application/approve/{id}', 'RetailerApplicationController@approve')->name('admin.customer_application.approve');
Route::put('/admin/customer_application/deny/{id}', 'RetailerApplicationController@deny')->name('admin.customer_application.deny');

// Route::resource('/admin/cssustomer_to_retailer_application', 'RetailerApplicationController');


//ADMIN/ COMMISSIONS
// Route::get('/admin/commissions', 'CommissionController@index');
// Route::get('/admin/commissions/create', 'CommissionController@create');
// Route::post('/admin/commissions/store', 'CommissionController@store');
// Route::put('/admin/commissions/{id}/edit', 'CommissionController@update');
// Route::put('/admin/commissions/{id}/put', 'CommissionController@destroy');

// ██████╗ ██╗   ██╗███████╗████████╗ ██████╗ ███╗   ███╗███████╗██████╗
// ██╔═══╝ ██║   ██║██╔════╝╚══██╔══╝██╔═══██╗████╗ ████║██╔════╝██╔══██╗
// ██║     ██║   ██║███████╗   ██║   ██║   ██║██╔████╔██║█████╗  ██████╔╝
// ██║     ██║   ██║╚════██║   ██║   ██║   ██║██║╚██╔╝██║██╔══╝  ██╔══██╗
// ╚██████╗╚██████╔╝███████║   ██║   ╚██████╔╝██║ ╚═╝ ██║███████╗██║  ██║
//  ╚═════╝ ╚═════╝ ╚══════╝   ╚═╝    ╚═════╝ ╚═╝     ╚═╝╚══════╝╚═╝  ╚═╝

//Customer / PRODUCTS
Route::get('/store/item/{id}', 'ProductController@showCustomer')->name('customer.product.show');

// CUSTOMER / CART
Route::get('/store/cart', 'ProductController@getmycart')->name('customer.cart.show');
Route::post('/store/cart/addtocart/{id}', 'ProductController@addtocart1')->name('customer.cart.add');
Route::delete('/store/cart/remove/{id}', 'ProductController@removecartitem')->name('customer.cart.remove');
Route::put('/store/cart/quantity/{id}', 'ProductController@updatequantity')->name('customer.cart.quantity');

// CUSTOMER / CART / CHECKOUT
Route::get('/store/checkout', 'OrderController@checkoutpage')->name('customer.checkout.show');
Route::post('/store/itemcheckout', 'OrderController@addtocheckout')->name('customer.checkout.add');
Route::post('/store/itemcheckout/order', 'OrderController@placeorder')->name('customer.checkout.order');

Route::post('/store/itemcheckout/pay/card', 'OrderController@payWithCard')->name('customer.pay.card');
Route::post('/store/itemcheckout/pay/ewallet', 'OrderController@payWithEWallet')->name('customer.pay.ewallet');

Route::get('/store/checkout/success', 'OrderController@redirectPaymongoSuccess')->name('customer.checkout.success');
Route::get('/store/checkout/failed', 'OrderController@redirectPaymongoFailed')->name('customer.checkout.failed');

//CUSTOMER/ SETTINGS / APPLICATIONS
Route::get('/settings/application/form', 'RetailerApplicationController@form')->name('customer.application.show');
Route::post('/settings/application/form', 'RetailerApplicationController@send')->name('customer.application.post');

//CUSTOMER/ SETTINGS / PROFILE
Route::get('/settings/profile', 'UserController@profile')->name('customer.profile.show');

//CUSTOMER/ SETTINGS / PROFILE / SETUP  if user skip register setUp
Route::get('/settings/profile/edit', 'UserController@editprofile')->name('customer.profile.edit');
Route::put('/settings/profile/update', 'UserController@updateprofile')->name('customer.profile.update');
//CUSTOMER/ SETTINGS / PROFILE / VERIFY - OTP if user skip OTP
Route::get('/settings/profile/verify', 'UserController@pverify')->name('customer.profile.pverify');
Route::put('/settings/profile/verify', 'UserController@pgetcode')->name('customer.profile.pgetcode');
Route::get('/settings/profile/verify/check', 'UserController@pentercode')->name('customer.profile.pentercode');
Route::put('/settings/profile/verify/check', 'UserController@pcheckcode')->name('customer.profile.pcheckcode');
Route::put('/settings/profile/verify/cancel', 'UserController@pcancelcode')->name('customer.profile.pcancelcode');
//CUSTOMER/ SETTINGS / PROFILE / add payment method
Route::get('/store/profile/addpayment',  'CardController@register')->name('customer.payment.register');
Route::post('/store/profile/addpayment/register',  'CardController@addcard')->name('customer.payment.addcard');
Route::get('/store/profile/paymentmethods',  'CardController@mycards')->name('customer.payment.mycards');
Route::delete('/store/profile/paymentmethods/{id}/delete',  'CardController@remove')->name('customer.payment.remove');

Route::get('/orders',  'OrderController@index')->middleware('auth')->name('client.order');
//CUSTOMER/ SETTINGS / PROFILE / ORDERS

Route::get('/store/my-order',  'OrderController@list')->name('client.order.list');
Route::get('/store/order-details/{id}',  'OrderController@detail')->name('client.order.detail');
Route::put('/store/orders/{id}/cancel',  'OrderController@cancel')->name('client.order.cancel');
Route::put('/store/orders/{id}/recieved',  'OrderController@recieve')->name('client.order.recieve');

//CUSTOMER/ SETTINGS / PROFILE
Route::get('/subscription', function () {
  return view('subscription.index');
});

// ██████╗ ███████╗████████╗ █████╗ ██╗██╗     ███████╗██████╗
// ██╔══██╗██╔════╝╚══██╔══╝██╔══██╗██║██║     ██╔════╝██╔══██╗
// ██████╔╝█████╗     ██║   ███████║██║██║     █████╗  ██████╔╝
// ██╔══██╗██╔══╝     ██║   ██╔══██║██║██║     ██╔══╝  ██╔══██╗
// ██║  ██║███████╗   ██║   ██║  ██║██║███████╗███████╗██║  ██║
// ╚═╝  ╚═╝╚══════╝   ╚═╝   ╚═╝  ╚═╝╚═╝╚══════╝╚══════╝╚═╝  ╚═╝

// RETAILER/ STORE
Route::put('/store/setup', 'StoreController@setupstore')->name('retailer.store.setupstore');
Route::get('/store/customize', 'StoreController@edit')->name('retailer.store.edit');
Route::put('/store/customize', 'StoreController@update')->name('retailer.store.update');

// RETAILER/ Products
Route::get('/store/products/create/{type}', 'ProductController@create')->name('retailer.products.create');
Route::get('/store/products/{id}', 'ProductController@show')->name('retailer.products.show');
Route::get('/store/products/{id}/removepic/{pic}', 'ProductController@removepicture')->name('retailer.products.removepicture');
Route::get('/store/products/{id}/remove', 'ProductController@remove')->name('retailer.products.remove');
Route::resource('/store/products', 'ProductController')->names([
  'index' => 'retailer.products.index',
  'store' => 'retailer.products.store',
  'show' => 'retailer.products.show',
  'edit' => 'retailer.products.edit',
  'update' => 'retailer.products.update',
]);

//Customer/ Search OR Filter by (category or reference)
Route::get('/store/search/', 'ProductLookController@search')->name('products.search');
Route::get('/store/filter/category/{id}', 'ProductLookController@categoryFilter')->name('products.category');
// Route::get('/store/filter/reference/{id}', 'ProductReferenceController@categoryFilter')->name('products.reference');
Route::get('/store/advance-search/', 'ProductLookController@searchFilter')->name('products.searchfilter');

Route::get('/store/filter2/category/{id}', 'ProductCatergoryController@show');
Route::get('/store/filter2/reference/{id}', 'ProductReferenceController@show');



Route::get('/store/{id?}', 'StoreController@front')->name('retailer.store.front');

Route::get('/store/view/{id}', 'StoreController@show')->name('store.show.products');

// Articles

Route::resource('/retailer/subscriptions', 'SubscriptionController');

Route::resource('/articles', 'ArticleController');
Route::delete('/service-cate-delete/{article_id}', 'ArticleController@delete');

// Order Management
Route::get('/store/retailer/my-order',  'OrderController@myroders')->name('retailer.order.list');
Route::get('/store/retailer/order-details/{id}',  'OrderController@orderdetail')->name('retailer.order.detail');
Route::put('/store/retailer/orders/{id}/cancel',  'OrderController@updateorder')->name('retailer.order.cancel');
Route::put('/store/retailer/orders/{id}/update',  'OrderController@ordercancel')->name('retailer.order.recieve');

// Notifications
// Route::get('/send-notification', [NotificationController::class, 'sendNotification']);


Route::get('/testroutes', function () 
{
    dd( session()->all() );


});
