<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pendaftaran;
use App\Models\Kontak;
use App\Models\Pelatihan;

class DashboardController extends Controller
{
    public function index()
    {
        $jumlahPendaftar = Pendaftaran::count();
        $jumlahKontak = Kontak::count();
        $jumlahPelatihan = Pelatihan::count();
        return view('admin.dashboard', compact('jumlahPendaftar', 'jumlahKontak', 'jumlahPelatihan'));
    }
}
