<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\paymentview;
use App\Http\Controllers\tourguests;
use App\Http\Controllers\tourcust;
use App\Http\Controllers\remove_excursion;
use App\Http\Controllers\deletebooking;
use App\Http\Controllers\make_paymentview;
use App\Http\Controllers\make_payment;
use App\Http\Controllers\ProgrammesController;
use App\Http\Controllers\Usercontroller;
use App\Http\Controllers\Admincontroller;
use App\Http\Controllers\adminhotel;
use App\Http\Controllers\admintour;
use App\Http\Controllers\logout;
use App\Http\Controllers\hotels;
use App\Http\Controllers\tour;
use App\Http\Controllers\programmes;
use App\Http\Controllers\cashier;



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
Route::get('/walkin/{booking?}', 'App\Http\Controllers\GuestController@walkinview');
Route::get('/pay',[paymentview::class,'payment']);
Route::post('/pay',[remove_excursion::class,'excursion_remove']);
Route::get('/tourguest/{booking?}',[tourguests::class,'tourview']);
Route::post('/createtour',[tourcust::class,'maketour']);
Route::post('/deletebooking',[deletebooking::class,'booking_delete']);
Route::post('/create', 'App\Http\Controllers\GuestController@walkin')->name('create');
Route::get('/payment', [make_paymentview::class,'makepmntview']);
Route::post('/payment', [make_payment::class,'makepmnt'])->name('payment');
Route::get('/login', function () {
    return view('/login');
});

Route::get('/programmes', function () {
    return view('programmes');
});

// Programme Controller
route::get("/programmes",[ProgrammesController::class,'programinfo']);

// Route to addprogramme blade
Route::get('/add', function () {
    return view('addprogramme');
});

// form action will be carried out through this controller to add new programme and store it into the database
Route::post("/addprogramme",[ProgrammesController::class,'addprogramme']);


Route::get('/updateprograme', function () {
    return view('updateprograminfo');
});

// updateprogramme form action will be carried out through this method to show exsisting programme info inside database

Route::get('/edit/{id?}',[ProgrammesController::class, 'programmeshowdata']);//Controller Working

// This method will save changes made to program
Route::post('edit',[ProgrammesController::class, 'updateprogramdata']);

// Delete program info
Route::get('delete/{id?}',[ProgrammesController::class,'programdelete']);
Route::get('/signin', function () {
    return view('signin');
});
Route::get('/signup', function () {
    return view('signup');
});
Route::post("/signin", [Usercontroller::class, 'login']);
Route::post("/register", [Usercontroller::class, 'adduser']);
Route::get('/Admin',[Admincontroller::class,'booking']);
Route::get('/Admin/{booking?}',[Admincontroller::class,'selectbooking'])->name('select_book');
Route::get('/adminhotel',[adminhotel::class,'hotel']);
Route::post('/adminhotel',[adminhotel::class,'deletehotel']);
Route::get('/addhotel', function () {
    return view('addhotel');
});
Route::post('/addhotel',[adminhotel::class,'addhotel']);
Route::get('/admintour',[admintour::class,'tours']);
Route::post('/admintour',[admintour::class,'deletetour']);
Route::get('/addtour', function () {
    return view('addtour');
});
Route::post('/addhotel',[admintour::class,'addtour']);
Route::get('/logout',[logout::class,'userlogout']);
Route::get('/cashier',[cashier::class,'booking']);
Route::get('/cashier/{booking?}',[cashier::class,'selectbooking']);
Route::get('/hotel',[hotels::class,'hotel']);
Route::get('/tour',[tour::class,'tours']);
route::get("/dolphincoveprogrammes",[programmes::class,'programinfo']);

Route::get('/tourcst', function () {
    return view('tourcst');
});
