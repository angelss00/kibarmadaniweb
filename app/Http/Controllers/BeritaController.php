<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class BeritaController extends Controller
{
    public function index()
    {
        $berita = Berita::orderBy('created_at', 'desc')->get(); // ambil 3 berita terbaru
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

    public function edit(Berita $berita)
    {
        return view('beritas.admin.edit', compact('berita'));
    }

    public function update(Request $request, Berita $berita)
    {
        $request->validate([
            'judul'  => ['required'],
            'konten' => ['required'],
            // JANGAN required; biar boleh kosong kalau kamu gak edit slug
            'slug'   => ['nullable', Rule::unique('beritas','slug')->ignore($berita->id)],
        ]);

        // Tentukan slug final:
        // - kalau user isi slug -> pakai itu (di-slugify)
        // - kalau kosong -> pertahankan slug lama (biar link lama gak rusak)
        $slug = $request->filled('slug')
            ? Str::slug($request->slug)
            : $berita->slug;

        $berita->update([
            'judul'  => $request->judul,
            'slug'   => $slug,
            'konten' => $request->konten,
        ]);

        // GUNAKAN nama rute yang memang ada (lihat bagian Routes di bawah)
        return redirect()->route('beritas.admin.index')->with('success', 'Berita berhasil diperbarui.');
    }


    public function destroy($id)
    {
        $berita = Berita::findOrFail($id);
        $berita->delete();

        return redirect()->route('beritas.admin.index')->with('success', 'Berita berhasil dihapus.');
    }
}
