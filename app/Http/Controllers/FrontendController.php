<?php

namespace App\Http\Controllers;

use App\Models\Info;

class FrontendController extends Controller
{
    public function homepage()
    {
        $items = Info::query()
            ->where('slider_name', 'homepage-hero') // ganti sesuai nama slider kamu
            ->where('is_active', true)
            ->where(fn($w) => $w->whereNull('start_at')->orWhere('start_at','<=', now()))
            ->where(fn($w) => $w->whereNull('end_at')->orWhere('end_at','>=', now()))
            ->orderBy('sort_order')
            ->orderBy('id')
            ->get();

        // render ke resources/views/index.blade.php
        return view('index', compact('items'));
    }
}
