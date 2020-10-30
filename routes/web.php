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
Route::get('item/detail/{id} ' , 'LandingPageController@detailItem');
Route::post('item/detail/{id}/like' , 'LandingPageController@likeItem');




Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


// ########################### Dashboard ################################
Route::name('dashboard')->middleware(['auth'])->group(function() {

		// ----------------------------------- Admin Dashboard --------------------------------------------------
		Route::name('admin')->middleware(['admin'])->prefix('admin')->namespace('Admin')->group(function() {
			Route::get('/dashboard' , 'DashboardController@index');

			Route::get('/contributor/all' , 'ContributorController@all');
			Route::get('/contributor/waiting' , 'ContributorController@waiting');

			Route::get('/member' , 'MemberController@index');

			// +++ Item +++
			Route::name('item')->prefix('item')->group(function() {
				Route::get('/all' , 'ItemController@all');
				Route::get('/waiting' , 'ItemController@waiting');
				Route::get('/waiting/{id}' , 'ItemController@waitingDetail');
				Route::post('/waiting/{id}/reject' , 'ItemController@waitingReject');
				Route::put('/waiting/{id}/accept ' , 'ItemController@waitingAccept');
					


				Route::get('/tag' , 'ItemController@tag');
				Route::get('/category' , 'ItemController@category');
				Route::post('/category' , 'ItemController@categoryStore');
				Route::delete('/category/{id}/delete' , 'ItemController@categoryDestroy');
					
					
				Route::get('reject' , 'ItemController@reject');
				Route::post('/reject' , 'ItemController@rejectStore');

				Route::delete('reject/{id}/delete' , 'ItemController@rejectDestroy');
					
				Route::get('/download/{id}' , 'ItemController@itemDownload');
				Route::delete('/destroy/{id}' , 'ItemController@itemDestroy');
					
					
			});

			Route::get('/earning' , 'EarningController@index');

			Route::get('/sales' , 'SalesController@index');
		});
		// =============================== Admin Dashbord ========================================



		// --------------------------------- Contributor DaShboard ------------------------------
		Route::name('contributor')->middleware(['contributor'])->prefix('contributor')->namespace('Contributor')->group(function() {
			Route::get('/dashboard' , 'DashboardController@index');

			// ++++ Item ++++
			Route::name('item')->prefix('item')->group(function() {
				Route::get('/upload' , 'ItemController@uploadCreate');
				Route::post('/upload' , 'ItemController@uploadStore');
					
				Route::get('/waiting' , 'ItemController@waiting');
					

				Route::get('reject' , 'ItemController@reject');
				Route::get('/accept' , 'ItemController@accept');

				Route::delete('/destroy/{id}' , 'ItemController@destroyItem');
					
			});

			Route::get('/sales' , 'SalesController@index');

			Route::get('/saldo' , 'SaldoController@index');
		});
		// ================================ Contributor Dashboard ===============================




		// --------------------------------- Member Dashboard ------------------------------
		Route::name('member')->middleware(['member'])->prefix('member')->namespace('Member')->group(function() {
			Route::get('dashboard' , 'DashboardController@index');
			Route::post('dashboard/contributor' , 'DashboardController@becomeContributor');
			

			Route::get('/download' , 'DownloadController@index');

			Route::get('/favorite' , 'FavoriteController@index');
				
			Route::get('collection' , 'CollectionController@index');
			Route::post('collection/create' , 'CollectionController@store');
			Route::post('collection/item/{id}/add' , 'CollectionController@additem');
				
				

			Route::get('cart' , 'CartController@index');
				
			Route::get('/profile' , 'ProfileController@index');
				
								
		});
		// ================================ Member Dashboard ===============================




});
// ########################### Dashboard ################################