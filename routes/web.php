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
Route::get('item/category/{category}' , 'LandingPageController@category');

// ++ help center ++
Route::name('help_center , ')->prefix('help')->group(function(){
	Route::get('/' , 'HelpCenterController@index');
	Route::get('/account' , 'HelpCenterController@account');
	Route::get('requirements' , 'HelpCenterController@requirements');
	Route::get('/upload' , 'HelpCenterController@upload');
	Route::get('/reject' , 'HelpCenterController@reject');
	Route::get('/payment' , 'HelpCenterController@payment');
	Route::get('contact' , 'HelpCenterController@contact');
});




Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


// ########################### Dashboard ################################
Route::name('dashboard , ')->middleware(['auth'])->group(function() {

		// ----------------------------------- Admin Dashboard --------------------------------------------------
		Route::name('admin , ')->middleware(['admin'])->prefix('admin')->namespace('Admin')->group(function() {
			Route::get('/dashboard' , 'DashboardController@index');

			Route::get('/contributor/all' , 'ContributorController@all');
			Route::get('/contributor/waiting' , 'ContributorController@waiting');
			Route::get('contributor/reject' , 'ContributorController@reject');

			Route::get('/member' , 'MemberController@index');
			Route::get('member/{id}' , 'MemberController@detail');

			// +++ Item +++
			Route::name('item , ')->prefix('item')->group(function() {
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

			// ++ payment ++
			Route::name('payment , ')->prefix('payment')->group(function() {
				Route::get('/method' , 'PaymentController@methodPayment');
				Route::post('method/create' , 'PaymentController@methodStore');
				Route::delete('method/delete/{id}' , 'PaymentController@methodDelete');

				Route::get('confirm' , 'PaymentController@confirm');
				Route::get('/confirm/{id}' , 'PaymentController@confirmDetail');
				Route::put('confirm/{id}/reject' , 'PaymentController@confirmReject');
				Route::put('confirm/{id}/accept' , 'PaymentController@confirmAccept');

				Route::get('/accept' , 'PaymentController@accept');
				Route::get('/accept/{id}' , 'PaymentController@acceptDetail');

				Route::get('reject' , 'PaymentController@reject');
				Route::get('/reject/{id}' , 'PaymentController@rejectDetail');

				Route::get('/download/proof/{id}' , 'PaymentController@downloadProof');
			});

			Route::get('/sales' , 'SalesController@index');
		});
		// =============================== Admin Dashbord ========================================



		// --------------------------------- Contributor DaShboard ------------------------------
		Route::name('contributor , ')->middleware(['contributor'])->prefix('contributor')->namespace('Contributor')->group(function() {
			Route::get('/dashboard' , 'DashboardController@index');

			// ++++ Item ++++
			Route::name('item , ')->prefix('item')->group(function() {
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
		Route::name('member , ')->middleware(['member'])->prefix('member')->namespace('Member')->group(function() {
			Route::get('dashboard' , 'DashboardController@index');
			Route::post('dashboard/contributor' , 'DashboardController@becomeContributor');
			

			Route::get('/download' , 'DownloadController@index');
			Route::get('/download/{id}' , 'DownloadController@downloadFile');

			Route::get('/favorite' , 'FavoriteController@index');
				
			// ++ collection ++
			Route::name('collection , ')->prefix('collection')->group(function() {
				Route::get('/' , 'CollectionController@index');
				Route::post('/create' , 'CollectionController@store');
				Route::post('/item/{id}/add' , 'CollectionController@additem');
				Route::get('/detail/{id}' , 'CollectionController@detailCollection');
			});
				
				

			// ++ cart ++
			Route::name('cart , ')->prefix('cart')->group(function() {
				Route::get('/' , 'CartController@index');
				Route::delete('/delete' , 'CartController@removeAllItem');
				Route::get('/payment' , 'CartController@payment');
				Route::get('/payment/{id}' , 'CartController@paymentConfirm');
				Route::post('/payment/{id}' , 'CartController@paymentSubmit');

				Route::post('/item/{id}/add' , 'CartController@addItem');
				Route::delete('/item/{id}/delete' , 'CartController@removeItem');
			});

			Route::get('/payment' , 'PaymentController@index');
			

				
			Route::get('/profile' , 'ProfileController@index');
				
								
		});
		// ================================ Member Dashboard ===============================




});
// ########################### Dashboard ################################