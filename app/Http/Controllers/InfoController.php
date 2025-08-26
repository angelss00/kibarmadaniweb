<?php

namespace App\Http\Controllers;

use App\Models\Info;
use App\Models\Category;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class InfoController extends Controller
{
    public function index()
    {
        $infos = Info::orderByDesc('id')->get(); // ambil semua info
        return view('infos.index', compact('infos'));
    }

    public function create()
    {
        $kategoris = Kategori::all(); // ambil semua kategori
        return view('infos.create', compact('kategoris'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'judul' => 'required|string|max:255',
            'isi' => 'required|string',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'kategori_id' => 'required|exists:kategoris,id',
        ]);

        if ($request->hasFile('gambar')) {
            $data['gambar'] = $request->file('gambar')->store('sliders', 'public');
        }

        Info::create($data);

        return redirect()->route('infos.index')->with('status', 'Info berhasil ditambahkan.');
    }


    public function edit(Info $info)
    {
        $kategoris = Kategori::all();
        return view('infos.edit', compact('info', 'kategoris'));
    }

    public function update(Request $request, Info $info)
    {
        $data = $request->validate([
            'judul' => 'required|string|max:255',
            'isi' => 'required|string',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'kategori_id' => 'required|exists:kategoris,id',
        ]);

        if ($request->hasFile('gambar')) {
            if ($info->gambar) {
                Storage::disk('public')->delete($info->gambar);
            }
            $data['gambar'] = $request->file('gambar')->store('', 'public');
        }

        $info->update($data);

        return redirect()->route('infos.index')->with('status', 'Info berhasil diperbarui.');
    }

    public function destroy(Info $info)
    {
        if ($info->gambar) {
            Storage::disk('public')->delete($info->gambar);
        }

        $info->delete();

        return redirect()->route('infos.index')->with('status', 'Info berhasil dihapus.');
    }
}
