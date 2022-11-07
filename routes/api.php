<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::controller(App\Http\Controllers\MpesaController::class)->group(function(){
   
    Route::post('sts/access/token', 'genarateAccessToken')->name('mpesa.genarateAccessToken');

    Route::post('sts/password/generate', 'generatePassword')->name('mpesa.genaratePassword');

    Route::post('sts/payment/confirmation', 'mpesaConfirmation')->name('mpesa.mpesaConfirmation');

    Route::post('sts/validation', 'mpesaValidation')->name('mpesa.mpesaValidation');

    Route::post('sts/register/urls', 'mpesaRegisterUrls')->name('mpesa.mpesaRegisterUrls');

});


