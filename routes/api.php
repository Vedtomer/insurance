<?php

use App\Http\Controllers\Api\LoginController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ApiController;










Route::prefix('agent')->group(function () {
    Route::post('login', [LoginController::class, 'agentLogin']);
    Route::post('signup', [LoginController::class, 'agentSignUp']);

    Route::middleware(['auth:api'])->group(function () {
        Route::post('logout', [LoginController::class, 'agentlogout']);

        Route::match(['get', 'post'],'/home', [ApiController::class, 'index']);
        Route::match(['get', 'post'],'/slider', [ApiController::class, 'getActiveSliders']);

     Route::match(['get', 'post'], '/getPolicy', [ApiController::class, 'getPolicy']);
     Route::match(['get', 'post'], '/getPointsSummary', [ApiController::class, 'getPointsSummary']);
     Route::match(['get', 'post'], '/pointsRedemption', [ApiController::class, 'pointsRedemption']);
     Route::match(['get', 'post'], '/points-ledger', [ApiController::class, 'PointsLedger']);
     Route::match(['get', 'post'], '/pending-premium-ledger', [ApiController::class, 'PendingPremiumLedger']);
     Route::match(['get', 'post'], '/transaction/{id?}', [ApiController::class, 'Transaction']);
    });

});
