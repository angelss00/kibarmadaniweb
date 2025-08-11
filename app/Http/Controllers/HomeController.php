<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use App\Models\VisiMisi;

class HomeController extends Controller
{
    public function index()
    {
        $berita = Berita::latest()->take(3)->get();
        $visiMisi = VisiMisi::first(); // asumsi hanya 1 data visi misi

        return view('index', compact('berita', 'visiMisi'));
    }
}
