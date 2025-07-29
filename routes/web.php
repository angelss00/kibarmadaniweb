<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\InfoController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\KontakController;
use App\Http\Controllers\MediaController;
use App\Http\Controllers\GaleriController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\FileDownloadController;
use App\Http\Controllers\DownloadCategoryController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\GaleriFrontendController;

// ✅ Halaman Welcome (tanpa middleware)
Route::get('/', function () {
    return view('welcome');
});

// routes/web.php
Route::post('/kontak', [KontakController::class, 'store'])->name('kontak.store');

Route::get('/galeri', [App\Http\Controllers\GaleriFrontendController::class, 'index'])->name('galeri.frontend');

Route::get('/tentang-kami', [PageController::class, 'about'])->name('about');


// ✅ Login & Logout Routes
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/', function () {
    return view('index');
})->name('home');


Route::post('/kontak', [KontakController::class, 'store'])->name('kontak.store');


// ✅ Semua route berikut hanya untuk user yang sudah login
Route::middleware(['auth'])->group(function () {

    // Dashboard
    Route::get('/admin/dashboard', function () {
        return view('admin.dashboard');
    })->name('dashboard');

    // Resource Routes (CRUD otomatis)
    Route::resource('menus', MenuController::class); // ✅ pastikan konsisten pakai "menus"
    Route::resource('users', UserController::class);
    Route::resource('infos', InfoController::class);
    Route::resource('kontaks', KontakController::class);
    Route::resource('media', MediaController::class);
    Route::resource('galeris', GaleriController::class);
    Route::resource('kategoris', KategoriController::class);
    Route::resource('file_downloads', FileDownloadController::class);
    Route::resource('download_categories', DownloadCategoryController::class);
});
