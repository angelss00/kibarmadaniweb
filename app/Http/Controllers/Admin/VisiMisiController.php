<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\VisiMisi;
use App\Models\VisiMisiImage;
use Illuminate\Http\Request;

class VisiMisiController extends Controller
{
    // Tampilkan form edit
    public function index()
    {
        $visiMisi = VisiMisi::all(); 
        $visiMisi = VisiMisi::with('images')->get();  // ngambil semua data visi misi, sesuai yang kamu pakai di view
        return view('admin.visi_misi.index', compact('visiMisi'));
    }

    public function create()
    {
        return view('admin.visi_misi.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'visi' => 'required|string',
            'misi' => 'required|string',
            'makna_kibar' => 'required|string',
        ]);

        VisiMisi::create([
            'visi' => $request->visi,
            'misi' => $request->misi,
            'makna_kibar' => $request->makna_kibar,
        ]);

        return redirect()->route('admin.visi-misi.index')->with('success', 'Data berhasil ditambahkan');
    }


    public function edit($id)
    {
        $visiMisi = VisiMisi::findOrFail($id);
        return view('admin.visi_misi.edit', compact('visiMisi'));
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'visi' => 'required|string',
            'misi' => 'required|string',
            'makna_kibar' => 'required|string',
        ]);

        $data = VisiMisi::findOrFail($id);
        $data->update($request->only('visi', 'misi', 'makna_kibar'));

        return redirect()->route('admin.visi-misi.index')->with('success', 'Data berhasil diperbarui');
    }

    public function destroy($id)
    {
        $item = VisiMisi::findOrFail($id);
        $item->delete();

        return redirect()->route('admin.visi-misi.index')->with('success', 'Data berhasil dihapus');
    }

    // Method upload gambar
    public function uploadImage(Request $request, $visiMisiId)
    {
        $request->validate([
            'image' => 'required|image|max:2048', // max 2MB
        ]);

        $visiMisi = VisiMisi::findOrFail($visiMisiId);

        $file = $request->file('image');
        $filename = time() . '_' . $file->getClientOriginalName();
        $file->storeAs('public/visi_misi_images', $filename);

        // Simpan data gambar ke db
        $visiMisi->images()->create([
            'image_path' => $filename,
        ]);

        return redirect()->back()->with('success', 'Gambar berhasil diupload');
    }
}
