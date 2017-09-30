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

	// Authentication Routes
	// Route::get('auth/login', 'Auth\LoginController@getLogin');
	// Route::post('auth/login', 'Auth\LoginController@postLogin');
	// Route::get('auth/logout', 'Auth\LoginController@getLogout');

	// // Registration Routes
	// Route::get('auth/register', 'Auth\RegisterController@getRegister');
	// Route::post('auth/register', 'Auth\RegisterController@postRegister');

	// For item SLUG  
	Route::get('getfinish/{slug}',['as' => 'getfinish.single','uses' => 'GetfinishController@getSingle'])->where('slug', '[\w\d\-\_]+');
	Route::get('getfinish', ['uses' => 'GetfinishController@getIndex', 'as' => 'getfinish.index']);

	// 首頁
	//Route::get('/', 'PagesController@getIndex');
	Route::get('/', 'CategoryController@index');	

	Route::get('welcome', 'PagesController@getWelcome');

	Route::get('about', 'PagesController@getAbout');

	Route::get('contact', 'PagesController@getContact');

	// 待辦事項
	Route::resource('items', 'ItemController');

	// 分類
	Route::resource('categories', 'CategoryController');

});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
