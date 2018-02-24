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

Route::get('/', 'WelcomePageController@index');

//	Test to get values is JSON
Route::get('/getUserJson/{id}', 'TestGetJSONWithURL@sendValuesOfUser');

//	URL to check if User is Registered or Not
Route::get('/getUserRegisteredJson/{email}', 'CheckIfLoggedInController@checkRegistration');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
