<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BeritaController extends Controller
{
    public function index()
    {
        $berita = Berita::orderBy('id', 'asc')->paginate(10);
        return view('beritas.admin.index', compact('berita'));
    }

    public function frontendIndex()
    {
        $berita = Berita::latest()->paginate(9);
        return view('berita.frontend.index', compact('berita'));
    }

    public function show($slug)
    {
        $berita = Berita::where('slug', $slug)->firstOrFail();
        return view('berita.frontend.show', compact('berita'));
    }



    public function home()
    {
        $berita = Berita::latest()->take(5)->get();
        return view('home', compact('berita'));
    }

    public function create()
    {
        return view('beritas.admin.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul'  => 'required',
            'konten' => 'required',
            'slug'   => 'nullable|unique:beritas,slug',
        ]);

        $slug = $request->slug ? Str::slug($request->slug) : Str::slug($request->judul);

        Berita::create([
            'judul'  => $request->judul,
            'slug'   => $slug,
            'konten' => $request->konten,
        ]);

        return redirect()->route('beritas.admin.index')->with('success', 'Berita berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $berita = Berita::findOrFail($id);
        return view('beritas.admin.edit', compact('berita'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'judul'  => 'required',
            'konten' => 'required',
            'slug'   => 'required|unique:beritas,slug,' . $id,
        ]);

        $berita = Berita::findOrFail($id);
        $slug = $request->slug ? Str::slug($request->slug) : Str::slug($request->judul);

        $berita->update([
            'judul'  => $request->judul,
            'slug'   => $slug,
            'konten' => $request->konten,
        ]);

        return redirect()->route('beritas.admin.index')->with('success', 'Berita berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $berita = Berita::findOrFail($id);
        $berita->delete();

        return redirect()->route('beritas.admin.index')->with('success', 'Berita berhasil dihapus.');
    }
}
