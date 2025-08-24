<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use App\Models\VisiMisi;
use App\Models\Section;
use App\Models\Info;

class HomeController extends Controller
{
    public function index()
    {
        $berita = Berita::latest()->take(3)->get();
        $visiMisi = VisiMisi::first(); // asumsi hanya 1 data visi misi
        $keunggulan = Section::where('type', 'keunggulan')->orderBy('order')->get();
        $layanan = Section::where('type', 'layanan')->orderBy('order')->get();


        $items = \App\Models\Info::where('slider_name', 'homepage-hero')
            ->where('is_active', 1)
            ->get();
        return view('index', compact('berita', 'visiMisi', 'keunggulan', 'layanan', 'items'));
    }
}
