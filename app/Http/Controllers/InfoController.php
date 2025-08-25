<?php

namespace App\Http\Controllers;

use App\Models\Info;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class InfoController extends Controller
{
    // Tampilkan 3 slider dengan gambar, judul, dan isi
    public function index()
    {
        // Ambil data slider yang aktif, misalnya 3 data terbaru
        $infos = Info::where('is_active', 1)
            ->orderByDesc('id')
            ->take(3)
            ->get(); // Ambil 3 slider aktif terbaru

        // Kirim data ke view
        return view('index', compact('infos'));
    }

    // Menampilkan form untuk menambah info baru
    public function create()
    {
        return view('infos.create');
    }

    // Menyimpan data info baru
    public function store(Request $request)
    {
        $data = $request->validate([
            'judul' => 'required|string|max:255',
            'isi'   => 'required|string',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        // Menyimpan gambar ke storage
        if ($request->hasFile('gambar')) {
            $data['gambar'] = $request->file('gambar')->store('sliders', 'public');
        }

        // Simpan data ke database
        Info::create($data);

        return redirect()->route('infos.index')->with('status', 'Info berhasil ditambahkan.');
    }

    // Menampilkan form untuk mengedit info
    public function edit(Info $info)
    {
        return view('infos.edit', compact('info'));
    }

    // Memperbarui data info
    public function update(Request $request, Info $info)
    {
        $data = $request->validate([
            'judul' => 'required|string|max:255',
            'isi'   => 'required|string',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        // Jika ada gambar baru, hapus gambar lama dan simpan gambar baru
        if ($request->hasFile('gambar')) {
            if ($info->gambar) {
                Storage::disk('public')->delete($info->gambar); // Menghapus gambar lama
            }
            $data['gambar'] = $request->file('gambar')->store('sliders', 'public');
        }

        // Update data info
        $info->update($data);

        return redirect()->route('infos.index')->with('status', 'Info berhasil diperbarui.');
    }

    // Menghapus info
    public function destroy(Info $info)
    {
        // Hapus gambar jika ada
        if ($info->gambar) {
            Storage::disk('public')->delete($info->gambar);
        }

        // Hapus data info
        $info->delete();

        return redirect()->route('infos.index')->with('status', 'Info berhasil dihapus.');
    }
}
