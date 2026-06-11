<?php

use App\Http\Controllers\RegisteredUserController;
use App\Http\Controllers\SessionsController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('guest')->group(function(){
    Route::get('/register',[RegisteredUserController::class,'create']);
    Route::post('/register',[RegisteredUserController::class,'store']);

    Route::get('/login',[SessionsController::class,'create']);
    Route::post('/login',[SessionsController::class,'store']);
});


Route::delete('/logout',[SessionsController::class,'destroy'])->middleware('auth');