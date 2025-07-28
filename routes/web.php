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

// ✅ Halaman Welcome (tanpa middleware)
Route::get('/', function () {
    return view('welcome');
});

// ✅ Login & Logout Routes
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/index', function () {
    return view('index');
});


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
