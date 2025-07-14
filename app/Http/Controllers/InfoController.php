<?php

namespace App\Http\Controllers;

use App\Models\Info;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class InfoController extends Controller
{
    public function index()
    {
        $infos = Info::with('kategori')->latest()->get();
        return view('infos.index', compact('infos'));
    }

    public function create()
    {
        $kategoris = Kategori::all();

        return view('infos.create', compact('kategoris'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'kategori_id' => 'required|exists:kategoris,id',
            'judul' => 'required|string|max:255',
            'isi' => 'nullable|string',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $data = $request->only('kategori_id', 'judul', 'isi');

        if ($request->hasFile('gambar')) {
            $data['gambar'] = $request->file('gambar')->store(
                'gambar_info',
                'public'
            );
        }

        Info::create($data);

        return redirect()->route('infos.index')->with('success', 'Info berhasil
ditambahkan.');
    }

    public function edit(Info $info)
    {
        $kategoris = Kategori::all();
        return view('infos.edit', compact('info', 'kategoris'));
    }

    public function update(Request $request, Info $info)
    {
        $request->validate([

            'kategori_id' => 'required|exists:kategoris,id',
            'judul' => 'required|string|max:255',
            'isi' => 'nullable|string',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $data = $request->only('kategori_id', 'judul', 'isi');

        if ($request->hasFile('gambar')) {
            // hapus gambar lama
            if ($info->gambar) {
                Storage::disk('public')->delete($info->gambar);
            }
            $data['gambar'] = $request->file('gambar')->store(
                'gambar_info',
                'public'
            );
        }

        $info->update($data);

        return redirect()->route('infos.index')->with('success', 'Info berhasil
diperbarui.');
    }

    public function destroy(Info $info)
    {
        if ($info->gambar) {
            Storage::disk('public')->delete($info->gambar);
        }

        $info->delete();

        return redirect()->route('infos.index')->with('success', 'Info berhasil
dihapus.');
    }
}
