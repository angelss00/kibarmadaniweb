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
use App\Http\Controllers\GalerryCategoryController;
use App\Http\Controllers\AlbumController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/



Route::middleware(['auth'])->group(function () {
    // ...
    Route::resource('galerry_categories', GalerryCategoryController::class);
    Route::resource('albums', AlbumController::class);
});


// ✅ Halaman Welcome / Home
Route::get('/', function () {
    return view('index'); // Ganti "welcome" ke "index" sesuai permintaan kamu sebelumnya
})->name('home');

// ✅ Halaman Statis Umum (Frontend)
Route::get('/tentang-kami', [PageController::class, 'about'])->name('about');
Route::get('/galeri', [GaleriFrontendController::class, 'index'])->name('galeri');
Route::post('/kontak', [KontakController::class, 'store'])->name('kontak.store');

// ✅ Login & Logout
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// ✅ Route Backend / Admin (dengan middleware auth)
Route::middleware(['auth'])->group(function () {

    // Dashboard
    Route::get('/admin/dashboard', function () {
        return view('admin.dashboard');
    })->name('dashboard');

    // Resource CRUD
    Route::resource('menus', MenuController::class);
    Route::resource('users', UserController::class);
    Route::resource('infos', InfoController::class);
    Route::resource('kontaks', KontakController::class);
    Route::resource('media', MediaController::class);
    Route::resource('galeris', GaleriController::class);
    Route::resource('kategoris', KategoriController::class);
    Route::resource('file_downloads', FileDownloadController::class);
    Route::resource('download_categories', DownloadCategoryController::class);
    
});
