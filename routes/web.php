<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\SatuanController;
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

// Route::get('/', function () {
//     return view('welcome');
// });


Route::controller(DashboardController::class)->group(function () {
    Route::get('/dashboard', 'index');
});

Route::controller(SatuanController::class)->group(function () {
    Route::get('/satuan', 'index');
    Route::get('/satuan/create', 'create');
    Route::post('/satuan/store', 'store');
    Route::get('/satuan/edit/{id}', 'edit');
    Route::post('/satuan/update/{id}', 'update');
    Route::delete('/satuan/delete/{id}', 'destroy');
});

Route::controller(KategoriController::class)->group(function () {
    Route::get('/kategori', 'index');
    Route::get('/kategori/create', 'create');
    Route::post('/kategori/store', 'store');
    Route::get('/kategori/edit/{id}', 'edit');
    Route::post('/kategori/update/{id}', 'update');
    Route::delete('/kategori/delete/{id}', 'destroy');
});