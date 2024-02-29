<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Redirect;




use App\Http\Controllers\LoginController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\PolicyController;
use App\Http\Controllers\Admin\AgentController;



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

// route::get('/home', [AdminController::class, 'home']);

route::get('table', [LoginController::class, 'table']);
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
        route::get('transaction/{id?}', [AdminController::class, 'transaction'])->name('transaction');

        // route::get('newhome', [AdminController::class, 'newhome']);
        // route::get('main', [AdminController::class, 'newheader']);
       

        Route::get('dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
        Route::match(['get', 'post'], '/upload-policy', [PolicyController::class, 'upload'])->name('upload.policy');
        Route::match(['get', 'post'], '/updateagentid/{royalsundaram_id?}/{agent_id?}', [AgentController::class, 'updateagentid'])
            ->name('updateagentid');


            Route::match(['get', 'post'], '/selectcommission/{royalsundaram_id?}/{agent_id?}', [AdminController::class, 'selectcommission'])
            ->name('selectcommission');

        Route::match(['get', 'post'], '/updatetransaction/{transaction_id?}', [AdminController::class, 'updatetransaction'])
            ->name('updatetransaction');


            Route::get('/policy-list', [PolicyController::class, 'PolicyList'])->name('policy.list');
            Route::get('/royalsundaram/{id?}', [AdminController::class, 'royalsundaram'])->name('royalsundaram');

        // Route::get('/royalsundaram/{id?}', [AdminController::class, 'royalsundaram'])->name('royalsundaram');

        // route::get('royalsundaramedit/{id?}', [AdminController::class, 'royalsundaramedit'])->name('royalsundaramedit');
        // Route::post('royalsundaramupdate/{id?}', [AdminController::class, 'royalsundaramupdate'])->name('royalsundaramupdate');

        // Route::get('/shriramgi', [AdminController::class, 'shriramgi'])->name('shriramgi');
        // Route::get('shriramgiedit', [AdminController::class, 'shriramgiedit'])->name('shriramgiedit');

    
        Route::match(['get', 'post'], '/agent', [AgentController::class, 'Agent'])->name('agent');
        Route::get('agent-list', [AgentController::class, 'AgentList'])->name('agent.list');

        Route::match(['get', 'post'], '/policy-pdf-upload', [PolicyController::class, 'policyUpload'])->name('policy.pdf.upload');
        Route::match(['get', 'post'], '/commission/{id}', [AgentController::class, 'commission'])
        ->name('agent.commission');
        Route::match(['get', 'post'], 'agent-edit/{id}', [AgentController::class, 'AgentEdit'])->name('agent.edit');



        route::get('userdelete/{id}', [AdminController::class, 'userdelete'])->name('userdelete');
        route::get('result', [AdminController::class, 'result']);
        route::get('profile', [AdminController::class, 'profile']);

        Route::get('/change-password', [AdminController::class, 'showChangePasswordForm'])->name('change-password');
        Route::post('/change-password', [AdminController::class, 'changePassword'])->name('change.password');
    });
});

