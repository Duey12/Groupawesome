<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\paymentview;
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
Route::get('/clear', 'App\Http\Controllers\GuestController@clear');
Route::get('/walkin/{booking?}', 'App\Http\Controllers\GuestController@walkinview');
Route::get('/pay',[paymentview::class,'payment']);
Route::post('/create', 'App\Http\Controllers\GuestController@walkin')->name('create');
Route::get('/payment', 'App\Http\Controllers\GuestController@makepmntview');
Route::post('/payment', 'App\Http\Controllers\GuestController@makepmnt')->name('payment');
