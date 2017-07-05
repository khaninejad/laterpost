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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/auth/twitter', 'Auth\LoginController@twitterRedirect');
Route::get('/auth/twitter/callback','Auth\LoginController@twitterCallback');

Route::get('/auth/bitly', 'Auth\LoginController@bitlyRedirect');
Route::get('/auth/bitly/callback', 'Auth\LoginController@bitlyCallback');

Route::get('/auth/signup','Auth\LoginController@signupAccount');

Route::any('/app/{path?}', function() {
    return view('app');
})->middleware('auth')->where('path', '.+');