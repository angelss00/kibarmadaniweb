<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use App\Models\VisiMisi;
use App\Models\Section;
use App\Models\Info;
use App\Models\Testimonial;
use App\Models\Pelatihan;

class HomeController extends Controller
{
    public function index()
    {
        $berita = Berita::latest()->take(3)->get();
        $visiMisi = VisiMisi::first(); // asumsi hanya 1 data visi misi
        $keunggulan = Section::where('type', 'keunggulan')->orderBy('order')->get();
        $layanan = Section::where('type', 'layanan')->orderBy('order')->get();
        $testimonials = Testimonial::latest()->take(3)->get();
        $pelatihans = Pelatihan::latest()->take(3)->get();

        $infos = Info::where('is_active', 1)
            ->orderByDesc('id')
            ->take(3)
            ->get();

        return view('index', compact('pelatihans','testimonials', 'berita', 'visiMisi', 'keunggulan', 'layanan', 'infos'));
    }
}
