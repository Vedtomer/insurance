<?php

use App\Http\Controllers\Api\LoginController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;




Route::prefix('agent')->group(function () {
    Route::post('login', [LoginController::class, 'agentLogin']);

    Route::middleware(['auth:api'])->group(function () {
        Route::post('logout', [LoginController::class, 'agentlogout']);
        Route::get('/getPolicy', [LoginController::class, 'getPolicy']);
    });

});
