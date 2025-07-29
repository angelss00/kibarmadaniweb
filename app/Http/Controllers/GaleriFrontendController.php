<?php

namespace App\Http\Controllers;

use App\Models\Galeri; // pastikan ini ada
use Illuminate\Http\Request;

class GaleriFrontendController extends Controller
{
    public function index()
    {
        $galeris = Galeri::where('status', 'published') // misalnya hanya yang published
                         ->orderBy('taken_at', 'desc')
                         ->get();

        return view('galeri', compact('galeris'));
    }
}

