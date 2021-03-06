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


Route::get('/verifyOTP','VerifyOTPController@showVerifyForm');

Route::post('/verifyOTP','VerifyOTPController@verify');

Route::post('/resend_otp','ResendOTPController@resend');

Route::group(['middleware' => 'TwoFA'], function(){
    Route::get('/home', 'HomeController@index')->name('home');
});
