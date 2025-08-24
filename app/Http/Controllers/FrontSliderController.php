<?php

namespace App\Http\Controllers;

use App\Models\Info;
use Illuminate\Http\Request;

class FrontSliderController extends Controller
{
    public function homepage()
    {
        $items = Info::query()
            ->slider('homepage-hero')   // scope yg kita buat di model Info
            ->active()
            ->scheduled()
            ->ordered()
            ->get();

        return view('welcome', compact('items'));
    }
}
