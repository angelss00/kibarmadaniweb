<?php

namespace App\Http\Controllers;

use App\Models\Galeri;
use App\Models\GalerryCategory;
use App\Models\Album;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class GaleriController extends Controller
{
    // Tampilkan semua galeri
    public function index()
    {
        $galeris = Galeri::with(['category', 'album'])->latest()->get();
        return view('galeris.index', compact('galeris'));
    }

    // Form tambah galeri
    public function create()
    {
        $categories = GalerryCategory::all();
        $albums = Album::all();
        return view('galeris.create', compact('categories', 'albums'));
    }

    // Simpan galeri baru
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'image_file' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'status' => 'required|in:draft,published,archived',
        ]);

        $imagePath = null;

        if ($request->hasFile('image_file')) {
            $imagePath = $request->file('image_file')->store('galeri', 'public');
        }

        Galeri::create([
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'description' => $request->description,
            'image_path' => '/storage/' . $imagePath,
            'category_id' => $request->category_id,
            'album_id' => $request->album_id,
            'uploader' => $request->uploader,
            'status' => $request->status,
            'taken_at' => $request->taken_at,
            'is_featured' => $request->has('is_featured'),
        ]);

        return redirect()->route('galeris.index')->with('success', 'Galeri berhasil ditambahkan.');
    }

    // Form edit galeri
    public function edit($id)
    {
        $galeri = Galeri::findOrFail($id);
        $categories = GalerryCategory::all();
        $albums = Album::all();
        return view('galeris.edit', compact('galeri', 'categories', 'albums'));
    }

    public function update(Request $request, Galeri $galeri)
    {
        // Validasi input
    $validated = $request->validate([
        'title' => 'required|string|max:255',
        'description' => 'nullable|string',
        'category_id' => 'nullable|exists:galerry_categories,id',
        'album_id' => 'nullable|exists:albums,id',
        'uploader' => 'nullable|string',
        'taken_at' => 'nullable|date',
        'status' => 'required|in:draft,published,archived',
        'is_featured' => 'nullable|boolean',
        'image_file' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
    ]);

    // Simpan gambar jika ada file baru
    if ($request->hasFile('image_file')) {
        $path = $request->file('image_file')->store('uploads/galeri', 'public');
        $validated['image_path'] = 'storage/' . $path;
    } else {
        $validated['image_path'] = $galeri->image_path; // tetap gunakan yang lama
    }

    $validated['slug'] = Str::slug($validated['title']);
    $validated['is_featured'] = $request->has('is_featured');

    $galeri->update($validated);

    return redirect()->route('galeris.index')->with('success', 'Galeri berhasil diperbarui.');
    }


    // Hapus galeri
    public function destroy($id)
    {
        $galeri = Galeri::findOrFail($id);
        $galeri->delete();
        return redirect()->route('galeris.index')->with('success', 'Galeri berhasil dihapus.');
    }
}
