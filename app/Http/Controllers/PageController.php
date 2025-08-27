<?php

namespace App\Http\Controllers;

use App\Models\Section;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function about()
    {
        return view('pages.about');
    }
    public function visiMisi()
    {
        $sections = Section::whereIn('type', ['visi', 'misi', 'makna'])
            ->orderBy('order')
            ->get()
            ->groupBy('type'); // hasil: ['visi'=>..., 'misi'=>..., 'makna'=>...]

        return view('pages.visi-misi', compact('sections'));
    }
}
