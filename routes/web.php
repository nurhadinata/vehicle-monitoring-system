<?php

use App\Http\Controllers\Admin;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ManagerController;
use App\Http\Controllers\VehiclesController;
use App\Http\Controllers\UsageRecordController;
use App\Models\UsageRecord;
use App\Models\Vehicles;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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
    return redirect('/home');
});

Route::get('/home',[HomeController::class, 'index'])->name('/home');


Route::prefix('/admin')->group(function(){
    Route::get('/',[AdminController::class, 'index'])->name('admin');
    Route::post('/',[AdminController::class, 'store'])->name('admin.post');
    Route::prefix('/vehicle-request')->group(function(){
        Route::post('/',[UsageRecordController::class, 'request'])->name('vehicle.request');
    });
});

Route::prefix('/manager')->group(function(){
    Route::get('/',[ManagerController::class, 'index'])->name('manager');
    Route::post('/',[ManagerController::class, 'store'])->name('manager.post');
});

Route::prefix('/vehicle')->group(function(){
    Route::get('/',[AdminController::class, 'index'])->name('vehicle');
    Route::post('/',[VehiclesController::class, 'store'])->name('vehicle.store');
});

Route::prefix('/usage-record')->group(function(){
    Route::get('/request-form/{id}', [UsageRecordController::class, 'requestForm'])->name('usage-record.request-form');
    Route::post('/request', [UsageRecordController::class, 'request'])->name('usage-record.request');
    Route::get('/accept/{id}',[UsageRecordController::class, 'acceptRequest'])->name('usage-record.accept-request');
    Route::get('/finished/{id}',[UsageRecordController::class, 'finishUsage'])->name('usage-record.finish-usage');
    Route::post('/finished/{id}',[UsageRecordController::class, 'finished'])->name('usage-record.finished');
    Route::get('/export', [UsageRecordController::class, 'export'])->name('usage-record.export');
    Route::get('record-chart/',[UsageRecordController::class, 'recordChart'])->name('usage-record.chart');
});


Auth::routes();