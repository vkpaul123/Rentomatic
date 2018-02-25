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

//	Welcome Page User
Route::get('/', 'WelcomePageController@index');
Route::get('about', 'WelcomePageController@about');
Route::get('contact', 'WelcomePageController@contact');

//	Welcome Page Seller
Route::get('/seller', 'WelcomePageSellerController@index');
Route::get('/seller/about', 'WelcomePageSellerController@about');
Route::get('/seller/contact', 'WelcomePageSellerController@contact');


//	Test to get values is JSON
Route::get('/getUserJson/{id}', 'TestGetJSONWithURL@sendValuesOfUser');

//	URL to check if User is Registered or Not
Route::get('/getUserRegisteredJson/{email}', 'CheckIfLoggedInController@checkRegistration');

//	User Routes
Route::group(['namespace' => 'User'], function() {
	//	Authentication Routes
	Auth::routes();
	
	Route::get('/home', 'HomeController@index')->name('home');
});

//	Seller Routes
Route::group(['namespace' => 'Seller'], function() {
	
	Route::prefix('seller')->group(function() {
		Route::get('home', 'HomeController@index')->name('seller.home');

		//	Authentication Routes
		Route::get('login', 'Auth\LoginController@showLoginForm')->name('seller.login');
		Route::post('login', 'Auth\LoginController@login');
		Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('seller.register');
		Route::post('register', 'Auth\RegisterController@register');
		Route::post('logout', 'Auth\LoginController@logout')->name('seller.logout');

		//	Property Routes
		Route::resource('property', 'PropertyController');
	});
});

//	Admin Routes
Route::group(['namespace' => 'Admin'], function() {
	
	Route::prefix('admin')->group(function() {
		Route::get('/', 'HomeController@index')->name('admin.home');

		//	Authentication Routes
		Route::get('login', 'Auth\LoginController@showLoginForm')->name('admin.login');
		Route::post('login', 'Auth\LoginController@login');
		Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('admin.register');
		Route::post('register', 'Auth\RegisterController@register');
		Route::post('logout', 'Auth\LoginController@logout')->name('admin.logout');
	});
});