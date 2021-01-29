<?php

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

Route::get('/', 'FrontendController@welcomePage')->name('root');
Route::get('contact-us', 'FrontendController@contactus')->name('contactus');
Route::post('saveContactUS', 'FrontendController@saveContactUS')->name('saveContactUS');
Route::get('privacy-and-policy', 'FrontendController@policy')->name('policy');








Auth::routes();


Route::get('test', 'TestController@test')->name('test');

Route::group(['middleware' => ['auth']], function () {

  Route::get('/home', 'HomeController@index')->name('home');
  Route::get('profile', 'ProfileController@profile')->name('profile');
  Route::get('profileUpdate/{user}', 'ProfileController@profileUpdate')->name('profileUpdate');
  Route::post('profileStore/{user}', 'ProfileController@profileStore')->name('profileStore');

  Route::get('markNotificationRead','NotificationController@markNotificationRead')->name('markNotificationRead');

  Route::resource('update','ProductController');
  Route::resource('withdraws','WithdrawController');

  Route::resource('referrals','RefferalController');


  Route::resource('memberships','MembershipController');

  Route::get('subscribe/{plan}','MembershipController@subscribe')->name('subscribe');



  Route::get('video/{encryptedId}','VideoController@video')->name('video');
  Route::get('videoWatchCompleted/{encryptedId}/{created_at}','VideoController@videoWatched')->name('videoWatched');

  Route::post('videoWUrl/{encryptedId}','VideoController@videoWUrl')->name('videoWatcheURL');

  Route::resource('salemans', 'SalemanController');
  Route::resource('products', 'ProductController');
  Route::resource('purchase', 'PurchaseController');
  Route::resource('expence', 'ExpenceController');
  Route::resource('company', 'CompanyController');
  Route::resource('pos', 'PosController');

  Route::get('productsSearch','ProductController@productsSearch')->name('productsSearch');

});

Route::group(['middleware' => ['auth', 'SuperAdminOnly']], function () {
  Route::resource('users','UserController');

  Route::resource('cashvideos','VideoController');

});
