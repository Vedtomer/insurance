<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Redirect;
use App\Http\Controllers\Agent\AgentController;



use App\Http\Controllers\LoginController;
use App\Http\Controllers\Admin\AdminController;
// use App\Http\Controllers\AdminController;



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


        Route::get('dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');

        Route::get('/userdata', [AdminController::class, 'userdata'])->name('userdata');
        Route::post('/userdata', [AdminController::class, 'userstore'])->name('userdata.store');
        route::get('userdata/{id}', [AdminController::class, 'view'])->name('view');
        route::get('newview/{id}', [AdminController::class, 'newview'])->name('newview');
        route::get('newedit/{id}', [AdminController::class, 'edit'])->name('newedit');
        Route::post('newupdate/{id}', [AdminController::class, 'newupdate'])->name('newupdate');
        route::get('delete/{id}', [AdminController::class, 'delete'])->name('delete');
        route::get('transaction/{id?}', [AdminController::class, 'transaction'])->name('transaction');

        route::get('newhome', [AdminController::class, 'newhome']);
        route::get('main', [AdminController::class, 'newheader']);
        Route::get('excel', [AdminController::class, 'excel']);



        Route::get('/excel', [AdminController::class, 'showForm'])->name('show.upload.form');
        Route::post('/excel', [AdminController::class, 'uploadExcel'])->name('upload.excel');

        Route::match(['get', 'post'], '/updateagentid/{royalsundaram_id?}/{agent_id?}', [AdminController::class, 'updateagentid'])
            ->name('updateagentid');
            Route::match(['get', 'post'], '/selectcommission/{royalsundaram_id?}/{agent_id?}', [AdminController::class, 'selectcommission'])
            ->name('selectcommission');

        Route::match(['get', 'post'], '/updatetransaction/{transaction_id?}', [AdminController::class, 'updatetransaction'])
            ->name('updatetransaction');

        Route::match(['get', 'post'], '/commission/{id?}', [AdminController::class, 'commission'])
        ->name('admin.commission');

        Route::get('/royalsundaram/{id?}', [AdminController::class, 'royalsundaram'])->name('royalsundaram');

        route::get('royalsundaramedit/{id?}', [AdminController::class, 'royalsundaramedit'])->name('royalsundaramedit');
        Route::post('royalsundaramupdate/{id?}', [AdminController::class, 'royalsundaramupdate'])->name('royalsundaramupdate');

        Route::get('/shriramgi', [AdminController::class, 'shriramgi'])->name('shriramgi');
        Route::get('shriramgiedit', [AdminController::class, 'shriramgiedit'])->name('shriramgiedit');

        Route::get('/useradd', [AdminController::class, 'useradd'])->name('useradd');
       

        Route::get('user', [AdminController::class, 'user'])->name('admin.user');
        Route::post('user', [AdminController::class, 'usersave'])->name('user.save');

        route::get('useredit/{id}', [AdminController::class, 'useredit'])->name('useredit');
        Route::post('userupdate/{id}', [AdminController::class, 'userupdate'])->name('userupdate');
        route::get('userdelete/{id}', [AdminController::class, 'userdelete'])->name('userdelete');
        route::get('result', [AdminController::class, 'result']);
        route::get('profile', [AdminController::class, 'profile']);
        Route::get('/header', [AdminController::class, 'header'])->name('admin.header');
        Route::get('/change-password', [AdminController::class, 'showChangePasswordForm'])->name('change-password');
        Route::post('/change-password', [AdminController::class, 'changePassword'])->name('change.password');
    });
});

// Route::match(['get', 'post'], '/login', [AgentController::class, 'login'])->name('login');
// Route::middleware('auth:agent')->group(function () {
//     Route::get('/logout', [AgentController::class, 'logout'])->name('logout');
//     Route::get('dashboard', [AgentController::class, 'dashboard'])->name('dashboard');
  
  
// });
