<?php

namespace App\Http\Controllers;

use App\Models\Galeri;
use App\Models\GalerryCategory;
use App\Models\Album;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
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
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image_file' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'category_id' => 'nullable|exists:galerry_categories,id',
            'album_id' => 'nullable|exists:albums,id',
            'uploader' => 'nullable|string|max:255',
            'taken_at' => 'nullable|date',
            'status' => 'required|in:draft,published,archived',
        ]);

        $imagePath = $request->file('image_file')->store('galeri', 'public');

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
    public function edit(Galeri $galeri)
    {
        $categories = GalerryCategory::all();
        $albums = Album::all();
        return view('galeris.edit', compact('galeri', 'categories', 'albums'));
    }

    // Update galeri
    public function update(Request $request, Galeri $galeri)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image_file' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'category_id' => 'nullable|exists:galerry_categories,id',
            'album_id' => 'nullable|exists:albums,id',
            'uploader' => 'nullable|string|max:255',
            'taken_at' => 'nullable|date',
            'status' => 'required|in:draft,published,archived',
        ]);

        // Jika ada gambar baru, hapus lama dan simpan baru
        if ($request->hasFile('image_file')) {
            if ($galeri->image_path && file_exists(public_path($galeri->image_path))) {
                unlink(public_path($galeri->image_path));
            }

            $imagePath = $request->file('image_file')->store('galeri', 'public');
            $galeri->image_path = '/storage/' . $imagePath;
        }

        $galeri->update([
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'description' => $request->description,
            'category_id' => $request->category_id,
            'album_id' => $request->album_id,
            'uploader' => $request->uploader,
            'status' => $request->status,
            'taken_at' => $request->taken_at,
            'is_featured' => $request->has('is_featured'),
        ]);

        return redirect()->route('galeris.index')->with('success', 'Galeri berhasil diperbarui.');
    }

    // Hapus galeri
    public function destroy(Galeri $galeri)
    {
        // Hapus gambar jika ada
        if ($galeri->image_path && file_exists(public_path($galeri->image_path))) {
            unlink(public_path($galeri->image_path));
        }

        $galeri->delete();
        return redirect()->route('galeris.index')->with('success', 'Galeri berhasil dihapus.');
    }
}
