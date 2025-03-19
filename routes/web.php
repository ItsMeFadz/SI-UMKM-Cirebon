<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KabupatenController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\KecamatanController;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PenggunaController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\ProfilumkmController;
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

Route::get('/', [LandingController::class, 'index'])->name('landing');
Route::get('/umkm', [LandingController::class, 'list_umkm'])->name('list-umkm');
Route::get('/about-us', [LandingController::class, 'about_us'])->name('tentang-kita');
Route::get('/contact-us', [LandingController::class, 'contact_us'])->name('kontak');
Route::post('/send-message', [ContactController::class, 'sendMessage'])->name('send.message');
Route::get('/umkm/details-umkm/{id}', [LandingController::class, 'details_umkm'])->name('details-umkm');
Route::get('/produk/details-product/{id}', [LandingController::class, 'details_product'])->name('details');
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::get('/registrasi', [LoginController::class, 'registrasi'])->name('registrasi');
Route::post('/login/login-proses', [LoginController::class, 'login_proses'])->name('login_proses');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
Route::post('/registrasi/proses', [LoginController::class, 'registrasiProses'])->name('proses');
Route::get('/notfound', [LoginController::class, 'notfound']);

Route::middleware('auth')->group(function () {
    Route::controller(DashboardController::class)->group(function () {
        Route::get('/dashboard', 'index')->name('Dashboard');
    });

    Route::middleware('admin')->group(function () {
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

        Route::controller(KecamatanController::class)->group(function () {
            Route::get('/kecamatan', 'index');
            Route::get('/kecamatan/create', 'create');
            Route::post('/kecamatan/store', 'store');
            Route::get('/kecamatan/edit/{id}', 'edit');
            Route::post('/kecamatan/update/{id}', 'update');
            Route::delete('/kecamatan/delete/{id}', 'destroy');
        });

        Route::controller(KabupatenController::class)->group(function () {
            Route::get('/kabupaten', 'index');
            Route::get('/kabupaten/create', 'create');
            Route::post('/kabupaten/store', 'store');
            Route::get('/kabupaten/edit/{id}', 'edit');
            Route::post('/kabupaten/update/{id}', 'update');
            Route::delete('/kabupaten/delete/{id}', 'destroy');
        });

        
        Route::controller(PenggunaController::class)->group(function () {
            Route::get('/pengguna', 'index');
            Route::get('/pengguna/create', 'create');
            Route::post('/pengguna/store', 'store');
            Route::get('/pengguna/edit/{id}', 'edit');
            Route::post('/pengguna/update/{id}', 'update');
            Route::delete('/pengguna/delete/{id}', 'destroy');
        });
        
    });
    
    Route::controller(ProdukController::class)->group(function () {
        Route::get('/produk', 'index');
        Route::get('/produk/create', 'create');
        Route::post('/produk/store', 'store');
        Route::get('/produk/edit/{id}', 'edit');
        Route::post('/produk/update/{id}', 'update');
        Route::delete('/produk/delete/{id}', 'destroy');
    });
    
    Route::controller(ProfilumkmController::class)->group(function () {
        Route::get('/profil-umkm', 'index');
        Route::get('/profil-umkm/{id}', 'visit_umkm');
        Route::post('/profil-umkm/update_account/{id}', 'update_account');
        Route::post('/profil-umkm/update_umkm/{id}', 'update_umkm');
    });

});

Route::fallback(function () {
    return view('error.404', ['active' => '404']);
});