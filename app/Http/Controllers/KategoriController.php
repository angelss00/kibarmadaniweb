<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    public function index(Request $request)
    {
        $perPage = (int) $request->input('per_page', 10);

        $kategoris = Kategori::query()
            // opsional: cari berdasarkan nama
            ->when(
                $request->filled('q'),
                fn($q) =>
                $q->where('nama', 'like', '%' . $request->q . '%')
            )
            ->orderBy('created_at', 'desc') // kalau tabel kategori TIDAK punya timestamps, ganti ke ->orderBy('id','desc')
            ->paginate($perPage)
            ->withQueryString(); // biar q/per_page ikut di link

        return view('kategoris.index', compact('kategoris'));
    }

    public function create()
    {
        return view('kategoris.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
        ]);

        Kategori::create($request->only(['nama', 'deskripsi']));

        return redirect()->route('kategoris.index')->with('success', 'Kategori
berhasil ditambahkan.');
    }

    public function edit(Kategori $kategori)
    {
        return view('kategoris.edit', compact('kategori'));
    }

    public function update(Request $request, Kategori $kategori)
    {

        $request->validate([
            'nama' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
        ]);

        $kategori->update($request->only(['nama', 'deskripsi']));

        return redirect()->route('kategoris.index')->with('success', 'Kategori
berhasil diperbarui.');
    }

    public function destroy(Kategori $kategori)
    {
        $kategori->delete();
        return redirect()->route('kategoris.index')->with('success', 'Kategori
berhasil dihapus.');
    }
}
