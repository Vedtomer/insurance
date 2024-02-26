<?php

use App\Http\Controllers\Api\LoginController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ApiController;



Route::prefix('agent')->group(function () {
    Route::post('login', [LoginController::class, 'agentLogin']);

    Route::middleware(['auth:api'])->group(function () {
        Route::post('logout', [LoginController::class, 'agentlogout']);
       
        Route::match(['get', 'post'],'/home', [ApiController::class, 'index']);
     
     Route::match(['get', 'post'], '/getPolicy', [LoginController::class, 'getPolicy']);
     Route::match(['get', 'post'], '/transaction/{id?}', [ApiController::class, 'Transaction']);
    });

});
