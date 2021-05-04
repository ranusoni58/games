<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\GameController;
use App\Http\Controllers\RechargeController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\FrontpageController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\MailController;

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
    return view('front.homepage');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/admin/dashboard', [App\Http\Controllers\HomeController::class, 'adminDashboard'])->name('admin.dashboard');
Route::get('/logout', [App\Http\Controllers\Auth\LoginController::class,'logout'])->name('logout');


Route::resource('/admin/slider',SliderController::class);
Route::get('/admin/slider/delete/{id}',[SliderController::class,'destroy']);
Route::get('/admin/slider/{id}/view',[SliderController::class,'show']);

Route::resource('/admin/game',GameController::class);
Route::get('/admin/game/delete/{id}',[GameController::class,'destroy'])->name('admin.game.delete');
Route::get('/admin/game/{id}/view',[GameController::class,'show']);

Route::resource('/admin/recharge',RechargeController::class);
Route::get('/admin/recharge/delete/{id}',[RechargeController::class,'destroy']);
Route::get('/admin/recharge/{id}/view',[RechargeController::class,'show']);

Route::resource('/admin/payment',PaymentController::class);
Route::get('/admin/payment/delete/{id}',[PaymentController::class,'destroy']);
Route::get('/admin/payment/{id}/view',[PaymentController::class,'show']);

//Route::get('/front/gamesdesc',[FrontpageController::class,'gamesdesc']);
Route::post('/front/{id}/gamesdesc',[FrontpageController::class,'save_game_data']);


Route::resource('/admin/page',PageController::class);
Route::get('/admin/page/delete/{id}',[PageController::class,'destroy']);
Route::get('/admin/page/{id}/view',[PageController::class,'show']);



// frontpage url
Route::get('/', [App\Http\Controllers\FrontpageController::class, 'index']);
Route::get('front/{id}/gamedesc', [App\Http\Controllers\FrontpageController::class, 'Description'])->name('game');

//paytm

Route::post('payment', [FrontpageController::class,'order']);

// Route::get('event-registration', [OrderController::class,'register']);
// Route::post('payment', [OrderController::class,'order']);

//mail

Route::get('/send-email',[MailController::class,'sendEmail']);