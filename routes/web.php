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

Route::get('/welcome', function () {
    return view('welcome');
});

Route::get('/' , 'LandingPageController@index');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::name('admin')->prefix('admin')->namespace('Admin')->group(function() {
	Route::get('/dashboard' , 'DashboardController@index');

	Route::get('/contributor/all' , 'ContributorController@all');
	Route::get('/contributor/waiting' , 'ContributorController@waiting');
});