<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AppSliderController;
use App\Http\Controllers\AppRechargeController;
use App\Http\Controllers\AppPlayerController;
use App\Http\Controllers\AppPageController;
use App\Http\Controllers\FrontpageController;
use App\Http\Controllers\AppGameController;
use App\Http\Controllers\OrderController;


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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('register',[UserController::class,'registration']);
Route::post('login',[UserController::class,'login']);



Route::apiResource('slider',AppSliderController::class)->middleware('auth:api');
Route::apiResource('game',AppGameController::class)->middleware('auth:api');
Route::apiResource('recharge',AppRechargeController::class)->middleware('auth:api');
Route::apiResource('player',AppPlayerController::class)->middleware('auth:api');
Route::apiResource('page',AppPageController::class)->middleware('auth:api');
Route::get('pagesort',[AppPageController::class,'sort']);
Route::get('gamesort',[AppGameController::class,'sort']);

Route::post('/payment/status', [FrontpageController::class,'paymentCallback']);
// Route::post('/payment/status', [OrderController::class,'paymentCallback']);