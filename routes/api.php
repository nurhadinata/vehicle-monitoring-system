<?php

use App\Http\Controllers\DriverController;
use App\Http\Controllers\VehiclesController;
use App\Http\Controllers\UsageRecordController;
use App\Models\Driver;
use App\Models\UsageRecord;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('/vehicles')->group(function(){
    Route::post('/store', [VehiclesController::class, 'store'])->name('vehicles.store');
});

Route::prefix('/driver')->group(function(){
    Route::post('/store', [DriverController::class, 'store'])->name('driver.store');
});

Route::prefix('/usage-record')->group(function(){
    Route::get('/request-form', [UsageRecordController::class, 'requestForm'])->name('usage-record.request-form');
});
