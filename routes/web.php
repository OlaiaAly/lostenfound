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

Route::get('/', function () {
    return view('home');
});

Route::get('/AboutUs', function () {
    return view('about');
});




//PAYMENTS PAYPAL
//App\Http\Controllers\PaymentController::class

Route::get('payment', 'App\Http\Controllers\PaymentController@index');
Route::post('charge', 'App\Http\Controllers\PaymentController@charge');
Route::get('success', 'App\Http\Controllers\PaymentController@success');
Route::get('error', 'App\Http\Controllers\PaymentController@error');

//PAYMENTS PAYPAL
// Route::controller(App\Http\Controllers\PaymentController::class)->group(function(){

//     Route::get('/payment/{id}', 'index' )->name('payment.index');

//     Route::get('payment/charge/{id}', 'charge' )->name('payment.charge');

//     Route::get('payment/success', 'success' )->name('payment.success');

//     Route::get('payment/error', 'error' )->name('payment.error');    
// });


 
//ROUTES ROM PUBLICATION
Route::controller(App\Http\Controllers\PublicationController::class)->group(function(){
   
    Route::get('/publication', 'index')->name('publication.index');

    Route::get('/publication/create', 'create')->name('publication.create')->middleware('auth');

    Route::post('/publication/store', 'store')->name('publication.store')->middleware('auth');

    Route::get('/publication/{id}', 'show')->name('publication.show')->middleware('auth');

    Route::get('/dashboard', 'dashboard')->name('publication.dashboard')->middleware('auth');

    Route::delete('/publication/remove/{id}', 'destroy')->name('publication.destroy')->middleware('auth');

    Route::get('/publication/edit/{id}', 'edit')->name('publication.edit')->middleware('auth');

    Route::put('/publication/update/{id}', 'update')->name('publication.update')->middleware('auth'); 


    

});


//ROUTES FROM USERS
Route::controller(App\Http\Controllers\UserControlller::class)->group(function(){
   
    Route::get('/user', 'index')->name('user.index');
    Route::get('/user/reveal/{id}', 'reveal')->name('user.reveal')->middleware('auth');
    Route::get('/user/show/{id}', 'show')->name('user.show')->middleware('auth');
    
    Route::get('user/contact', 'sendMail')->name('user.sendMail')->middleware('auth');
    
    Route::post('/user/mailing', 'mailing')->name('user.mailing')->middleware('auth');

});


Route::controller(App\Http\Controllers\PaymentController::class)->group(function(){
    Route::get('/payment/historic', 'paymentsHistoric')->name('payment.paymentsHistoric');
});