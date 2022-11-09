<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\TransactionController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\WalletController;
use Illuminate\Contracts\Auth\UserProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;



Route::post('login',[AuthController::class,'login']);
Route::post('user',[UserController::class,'store']);


Route::group(['middleware' => ['auth:sanctum']],function(){

    Route::apiResource('user',UserController::class)->only('index','destroy');
    Route::get('wallet',[WalletController::class,'index']);
    Route::apiResource('user.wallet',WalletController::class)->only('index','store');
    Route::get('transaction',[TransactionController::class,'index']);
    Route::apiResource('wallet.transaction',TransactionController::class)->only('index','store');

});
