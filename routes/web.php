<?php

use Illuminate\Support\Facades\Route;

// Controllers
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\KontakController;
use App\Http\Controllers\PendaftaranController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\GaleriFrontendController;
use App\Http\Controllers\TestimonialController;

// Admin controllers (middleware: auth)
use App\Http\Controllers\MenuController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MediaController;
use App\Http\Controllers\GaleriController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\InfoController;
use App\Http\Controllers\FileDownloadController;
use App\Http\Controllers\DownloadCategoryController;
use App\Http\Controllers\SectionController;
use App\Http\Controllers\Admin\VisiMisiController;
use App\Http\Controllers\Admin\PelatihanController;
use App\Http\Controllers\GalerryCategoryController;
use App\Http\Controllers\AlbumController;
use App\Http\Controllers\DashboardController;

/*
|--------------------------------------------------------------------------
| Public (Frontend)
|--------------------------------------------------------------------------
*/

// ✅ Homepage — ini SATU-SATUNYA route "/"
Route::get('/', [HomeController::class, 'index'])->name('home');


// Halaman statis
Route::get('/tentang-kami', [PageController::class, 'about'])->name('about');
Route::get('/galeri', [GaleriFrontendController::class, 'index'])->name('galeri');

// Kontak (form publik)
Route::post('/kontak', [KontakController::class, 'store'])->name('kontak.store');



Route::middleware(['auth'])->group(function () {
    Route::get('/infos', [InfoController::class, 'index'])->name('infos.index');
    Route::get('/infos/create', [InfoController::class, 'create'])->name('infos.create');
    Route::post('/infos', [InfoController::class, 'store'])->name('infos.store');
    Route::get('/infos/{info}/edit', [InfoController::class, 'edit'])->name('infos.edit');
    Route::put('/infos/{info}', [InfoController::class, 'update'])->name('infos.update');
    Route::delete('/infos/{info}', [InfoController::class, 'destroy'])->name('infos.destroy');
});



Route::get('/downloads', [FileDownloadController::class, 'index'])->name('file_downloads.index');
Route::get('/downloads/{file}/download', [FileDownloadController::class, 'download'])->name('file_downloads.download');



Route::prefix('admin')->name('admin.')->group(function () {
    Route::resource('sections', SectionController::class);
});

// Pendaftaran (publik)
Route::get('/pendaftaran', [PendaftaranController::class, 'create'])->name('pendaftarans.create');
Route::post('/pendaftaran', [PendaftaranController::class, 'store'])->name('pendaftarans.store');

// (opsional) daftar yg bisa dilihat non-admin? kalau khusus admin, pindah ke group admin
Route::get('/pelatihans/jadwal', [PelatihanController::class, 'jadwal'])->name('pelatihans.jadwal');

// Berita (frontend publik)
Route::get('/berita', [BeritaController::class, 'frontendIndex'])->name('berita.frontend.index');
Route::get('/berita/{slug}', [BeritaController::class, 'show'])->name('berita.frontend.show');

Route::get('pendaftarans/{id}/show', [PendaftaranController::class, 'show'])->name('pendaftarans.show');
// Mengarahkan ke index() di BeritaController


Route::get('kontaks/{id}/show', [KontakController::class, 'show'])->name('kontaks.show');
Route::resource('infos', InfoController::class);

// kalau mau fitur tambahan
Route::post('infos/reorder', [InfoController::class, 'reorder'])->name('infos.reorder');
Route::patch('infos/{info}/toggle', [InfoController::class, 'toggle'])->name('infos.toggle');

Route::resource('testimonials', TestimonialController::class);


/*
|--------------------------------------------------------------------------
| Auth
|--------------------------------------------------------------------------
*/
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');




/*
|--------------------------------------------------------------------------
| Admin (Backend) - protected
|--------------------------------------------------------------------------
*/
Route::middleware(['auth'])->group(function () {
    Route::get('/admin/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::get('/visi-misi', [PageController::class, 'visiMisi'])->name('visi.misi');
    // Pendaftaran (manajemen)
    // daftar
    Route::get('pendaftarans', [PendaftaranController::class, 'index'])->name('pendaftarans.index');

    // form tambah data
    Route::get('pendaftarans/create', [PendaftaranController::class, 'create'])->name('pendaftarans.create');

    // simpan data
    Route::post('pendaftarans', [PendaftaranController::class, 'store'])->name('pendaftarans.store');

    // hapus
    Route::delete('pendaftarans/{id}', [PendaftaranController::class, 'destroy'])->name('pendaftarans.destroy');

    // Untuk filedownload.blade.php
    Route::get('/filedownload', function () {
        return view('filedownload');
    })->name('filedownload');

    // Untuk file_downloads/index.blade.php
    Route::get('/file_downloads', [FileDownloadController::class, 'index'])->name('file_downloads.index');
    Route::get('/filedownload', [FileDownloadController::class, 'filedownloadPage'])->name('filedownload');


    Route::prefix('admin')->group(function () {
        Route::resource('beritas', BeritaController::class)->names([
            'index'   => 'beritas.admin.index',
            'create'  => 'beritas.admin.create',
            'store'   => 'beritas.admin.store',
            'show'    => 'beritas.admin.show',
            'edit'    => 'beritas.admin.edit',
            'update'  => 'beritas.admin.update',
            'destroy' => 'beritas.admin.destroy',
        ]);
    });

    // Resources (CRUD)
    Route::resource('menus', MenuController::class);
    Route::resource('users', UserController::class);
    Route::resource('media', MediaController::class);
    Route::resource('galeris', GaleriController::class);
    Route::resource('kontaks', KontakController::class);
    Route::resource('kategoris', KategoriController::class);
    Route::resource('file_downloads', FileDownloadController::class);
    Route::resource('download_categories', DownloadCategoryController::class);
    Route::resource('sections', SectionController::class);
    Route::resource('pelatihans', PelatihanController::class);

    // Admin Visi Misi
    Route::prefix('admin')->name('admin.')->group(function () {
        Route::resource('visi-misi', VisiMisiController::class);
        // Kalau masih butuh endpoint upload image khusus:
        Route::post('visi-misi/{id}/upload-image', [VisiMisiController::class, 'uploadImage'])->name('visi-misi.upload-image');
    });

    // Galeri tambahan
    Route::resource('galerry_categories', GalerryCategoryController::class);
    Route::resource('albums', AlbumController::class);
});


/*
|--------------------------------------------------------------------------
| Catatan Penting
|--------------------------------------------------------------------------
|
| 1) DULUNYA ada banyak Route::get('/') yang bentrok:
|    - InfoController@homepage
|    - FrontendController@homepage
|    - HomeController@index
|    Di Laravel, definisi TERAKHIR yang dipakai → bikin $items tidak terkirim.
|    Sekarang kita sisakan SATU: HomeController@index.
|
| 2) Pastikan HomeController@index mengirim semua variabel yang dipakai view:
|    return view('index', compact('berita','visiMisi','keunggulan','layanan','items'));
|
| 3) Jika kamu simpan view di subfolder (mis. resources/views/frontend/index.blade.php),
|    ganti ke: return view('frontend.index', compact(...));
|
*/
