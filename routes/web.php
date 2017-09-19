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

/*
Route::get('/', function () {
    return view('welcome');
});

Route::get('about', function () {
    return view('about');
});

Route::get('contact', function () {
    return view('contact');
});*/

//middleware is for CSRF attack protection
Route::group(['middleware' => ['web']], function() {

	Route::get('getfinish/{slug}',['as' => 'getfinish.single','uses' => 'GetfinishController@getSingle'])->where('slug', '[\w\d\-\_]+');

	Route::get('getfinish', ['uses' => 'GetfinishController@getIndex', 'as' => 'getfinish.index']);


	Route::get('/', 'PagesController@getIndex');

	Route::get('welcome', 'PagesController@getWelcome');

	Route::get('about', 'PagesController@getAbout');

	Route::get('contact', 'PagesController@getContact');

	Route::resource('items', 'ItemController');
});
