<?php

use Illuminate\Support\Facades\Route;
use App\http\Controllers\McoaController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('/auth/login');
});
Route::middleware(['auth'])->group(function () {
    Route::get('/mcoa', [McoaController::class, 'index']);
    Route::post('/mcoa/store', [McoaController::class, 'store']);
    Route::get('/mcoa/{id}/edit', [McoaController::class, 'edit']);
    Route::put('/mcoa/{id}', [McoaController::class, 'update']);
    Route::delete('/mcoa/{id}', [McoaController::class, 'destroy']);

    Route::get('/mcoa/vkategori', [McoaController::class, 'vkategori']);
    Route::post('/mcoa/storeKategori', [McoaController::class, 'storeKategori']);
    Route::delete('/mcoa/vkategori/{id}', [McoaController::class, 'destroyKategori']);

    Route::get('/mcoa/vtransaction', [McoaController::class, 'vtransaction']);
    Route::post('/mcoa/storeTransaction', [McoaController::class, 'storeTransaction']);
    Route::delete('/mcoa/vtransaction/{id}', [McoaController::class, 'destroyTransaction']);
    Route::get('/mcoa/{id}/editTransaction', [McoaController::class, 'editTransaction']);
    Route::put('/mcoa/vtransaction/{id}', [McoaController::class, 'updateTransaction']);

    Route::get('/mcoa/vreports', [McoaController::class, 'vreports']);
    Route::post('/mcoa/storeReports', [McoaController::class, 'storeReports']);
    Route::delete('/mcoa/vreports/{id}', [McoaController::class, 'destroyReports']);
    Route::get('/mcoa/{id}/editReports', [McoaController::class, 'editReports']);
    Route::put('/mcoa/vreports/{id}', [McoaController::class, 'updateReports']);
    // Route::get('/mcoa/vreports', [McoaController::class, 'exportExcel'])->name('exportExcel');

    Route::get('/mcoa/exportreports', [McoaController::class, 'exportreports']);
});





Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
