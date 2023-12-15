<?php

// use LoginController;
use Illuminate\Http\Request;
use Illuminate\Auth\Events\Login;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\LoginController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });


// Route::prefix('agent')->group(function () {
   
   

// Route::post('login', [LoginController::class, 'agentLogin']);

// // Route::middleware('auth:api')->group(function () {

// //     Route::post('logout', [LoginController::class, 'agentlogout']);
// // });

// Route::middleware(['auth:api', 'request.log'])->post('api/agentlogout', function (Request $request) {
//     $request->user()->token()->revoke();
// });



// });

Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('/get_policies_count', [LoginController::class, 'getPoliciesCount']);


Route::prefix('agent')->group(function () {
    Route::post('login', [LoginController::class, 'agentLogin']);

    Route::middleware(['auth:api', 'request.log'])->post('logout', function (Request $request) {
        $request->user()->tokens()->revoke();
    });
});




