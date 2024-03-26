<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Redirect;




use App\Http\Controllers\LoginController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\PolicyController;
use App\Http\Controllers\Admin\AgentController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\Admin\PointRedemptionController;
use App\Http\Controllers\SliderController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('home');
});



route::get('login', [LoginController::class, 'index']);
route::get('dash', [LoginController::class, 'show']);
route::get('user', [LoginController::class, 'usershow']);

route::get('table', [LoginController::class, 'table']);

Route::get('/policies/privacy-policy', [PagesController::class, 'PrivacyPolicy'])->name('privacy.policy');

// Admin Routes
Route::prefix('admin')->group(function () {
    Route::get('/', function () {
        return Redirect::route('admin.login');
    });

    Route::match(['get', 'post'], '/login', [AdminController::class, 'login'])->name('admin.login');


    Route::middleware('auth:admin')->group(function () {
        Route::get('/logout', [AdminController::class, 'logout'])->name('admin.logout');




        // Route::get('/userdata', [AdminController::class, 'userdata'])->name('userdata');
        // Route::post('/userdata', [AdminController::class, 'userstore'])->name('userdata.store');
        // route::get('userdata/{id}', [AdminController::class, 'view'])->name('view');
        // route::get('newview/{id}', [AdminController::class, 'newview'])->name('newview');
        // route::get('newedit/{id}', [AdminController::class, 'edit'])->name('newedit');
        // Route::post('newupdate/{id}', [AdminController::class, 'newupdate'])->name('newupdate');
        // route::get('delete/{id}', [AdminController::class, 'delete'])->name('delete');
        route::get('transaction/{id?}', [AdminController::class, 'Transaction'])->name('transaction');
        Route::match(['get', 'post'], '/add-transaction', [AdminController::class, 'AddTransaction'])
            ->name('add.transaction');


        Route::get('dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
        Route::match(['get', 'post'], '/upload-policy', [PolicyController::class, 'upload'])->name('upload.policy');
        Route::match(['get', 'post'], '/updateagentid/{royalsundaram_id?}/{agent_id?}', [AgentController::class, 'updateagentid'])
            ->name('updateagentid');


        Route::match(['get', 'post'], '/selectcommission/{royalsundaram_id?}/{agent_id?}', [AdminController::class, 'selectcommission'])
            ->name('selectcommission');

        Route::match(['get', 'post'], '/updatetransaction/{transaction_id?}', [AdminController::class, 'updatetransaction'])
            ->name('updatetransaction');


        Route::match(['get', 'post'], '/policy-list', [PolicyController::class, 'PolicyList'])->name('policy.list');
        Route::get('/royalsundaram/{id?}', [AdminController::class, 'royalsundaram'])->name('royalsundaram');



        Route::match(['get', 'post'], '/agent', [AgentController::class, 'Agent'])->name('agent');
        Route::get('agent-list', [AgentController::class, 'AgentList'])->name('agent.list');
        Route::match(['get', 'post'], '/commission-code', [AgentController::class, 'commissionCode'])->name('commission.code');

        #Slider Routes
        Route::get('/sliders', [SliderController::class, 'index'])->name('sliders.index');
        Route::post('/sliders/{slider}/toggle-status', [SliderController::class, 'toggleStatus'])->name('sliders.toggleStatus');
        Route::get('/sliders/create', [SliderController::class, 'create'])->name('sliders.create');
        Route::post('/sliders', [SliderController::class, 'store'])->name('sliders.store');
        Route::delete('/sliders/{slider}', [SliderController::class, 'destroy'])->name('sliders.destroy');



        Route::match(['get', 'post'], '/policy-pdf-upload', [PolicyController::class, 'policyUpload'])->name('policy.pdf.upload');
        Route::match(['get', 'post'], '/commission/{id}', [AgentController::class, 'commission'])
            ->name('agent.commission');

        Route::get('/delete-commission/{id}', [AgentController::class, 'destroy'])->name('delete.commission');
        Route::match(['get', 'post'], 'agent-edit/{id}', [AgentController::class, 'AgentEdit'])->name('agent.edit');



        route::get('userdelete/{id}', [AdminController::class, 'userdelete'])->name('userdelete');
        route::get('result', [AdminController::class, 'result']);
        route::get('profile', [AdminController::class, 'profile']);

        Route::get('/change-password', [AdminController::class, 'showChangePasswordForm'])->name('change-password');
        Route::post('/change-password', [AdminController::class, 'changePassword'])->name('change.password');


        Route::get('/points/redemption', [PointRedemptionController::class, 'index'])->name('points.index');
        Route::get('/points/redemRequest', [PointRedemptionController::class, 'ReedemRequest'])->name('points.redem.request');
        Route::post('/redeem/success/{pointId?}', [PointRedemptionController::class, 'redeemSuccess'])->name('redeem.success');
        Route::post('/redeem/cancel/{pointId}', [PointRedemptionController::class, 'cancelRedemption'])->name('redeem.cancel');
    });
});
