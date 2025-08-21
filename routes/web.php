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
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\VisiMisiController;
use App\Http\Controllers\Admin\PelatihanController;
use App\Http\Controllers\PendaftaranController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/



// untuk user daftar
Route::get('pendaftaran', [PendaftaranController::class, 'create'])->name('pendaftarans.create');
Route::post('pendaftaran', [PendaftaranController::class, 'store'])->name('pendaftarans.store');

// untuk manajemen (tanpa prefix admin)
Route::get('pendaftarans', [PendaftaranController::class, 'index'])->name('pendaftarans.index');
Route::delete('pendaftarans/{id}', [PendaftaranController::class, 'destroy'])->name('pendaftarans.destroy');



Route::get('/pelatihans/jadwal', [PelatihanController::class, 'jadwal'])
    ->name('pelatihans.jadwal');


Route::get('/', [HomeController::class, 'index'])->name('home');

Route::prefix('beritas/admin')->name('beritas.admin.')->group(function () {
    Route::get('/', [BeritaController::class, 'index'])->name('index');
    Route::get('/create', [BeritaController::class, 'create'])->name('create');
    Route::post('/', [BeritaController::class, 'store'])->name('store');
    Route::get('/{berita}/edit', [BeritaController::class, 'edit'])->name('edit');
    Route::put('/{berita}', [BeritaController::class, 'update'])->name('update');
    Route::delete('/{berita}', [BeritaController::class, 'destroy'])->name('destroy');
});


Route::post('admin/visi-misi/{id}/upload-image', [VisiMisiController::class, 'uploadImage'])->name('admin.visi-misi.upload-image');
Route::post('visi-misi/upload-image/{id}', [VisiMisiController::class, 'uploadImage'])->name('admin.visi-misi.upload-image');





Route::resource('pelatihans', PelatihanController::class);



Route::prefix('admin')->middleware(['auth'])->group(function () {
    Route::get('visi-misi', [VisiMisiController::class, 'index'])->name('admin.visi-misi.index');
    Route::get('visi-misi/edit/{id}', [VisiMisiController::class, 'edit'])->name('admin.visi-misi.edit');
    Route::put('visi-misi/update/{id}', [VisiMisiController::class, 'update'])->name('admin.visi-misi.update');
    Route::get('visi-misi/create', [VisiMisiController::class, 'create'])->name('admin.visi-misi.create');
    Route::post('visi-misi/store', [VisiMisiController::class, 'store'])->name('admin.visi-misi.store');
    Route::delete('visi-misi/delete/{id}', [VisiMisiController::class, 'destroy'])->name('admin.visi-misi.destroy');
});



Route::resource('berita', BeritaController::class);

// Route frontend berita (publik)
Route::get('/berita', [BeritaController::class, 'frontendIndex'])->name('berita.frontend.index');
Route::get('/berita/{id}', [BeritaController::class, 'show'])->name('berita.frontend.show');


Route::get('/', [HomeController::class, 'index'])->name('home');



Route::middleware(['auth'])->group(function () {
    // ...
    Route::resource('galerry_categories', GalerryCategoryController::class);
    Route::resource('albums', AlbumController::class);
});




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
