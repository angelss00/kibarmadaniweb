<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pelatihan;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class PelatihanController extends Controller
{
    // Tampilkan semua pelatihan dengan pagination
     public function latestForHomepage()
    {
        return Pelatihan::latest()->take(3)->get();
    }
    
    public function index()
    {
        $pelatihans = Pelatihan::latest()->paginate(10);
        return view('pelatihans.index', compact('pelatihans'));
    }

    // Form tambah pelatihan
    public function create()
    {
        return view('pelatihans.create');
    }

    // Simpan pelatihan baru
    public function store(Request $request)
    {
        $request->validate([
            'nama_pelatihan' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'tanggal_mulai' => 'required|date',
            'tanggal_selesai' => 'nullable|date|after_or_equal:tanggal_mulai',
            'lokasi' => 'nullable|string|max:255',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $data = $request->only(['nama_pelatihan', 'deskripsi', 'tanggal_mulai', 'tanggal_selesai', 'lokasi']);

        if ($request->hasFile('gambar')) {
            $data['gambar'] = $request->file('gambar')->store('pelatihans', 'public');
        }

        Pelatihan::create($data);

        return redirect()->route('pelatihans.index')->with('success', 'Pelatihan berhasil dibuat');
    }

    // Form edit pelatihan
    public function edit($id)
    {
        $pelatihan = Pelatihan::findOrFail($id);
        return view('pelatihans.edit', compact('pelatihan'));
    }

    // Update pelatihan
    public function update(Request $request, Pelatihan $pelatihan)
    {
        $request->validate([
            'nama_pelatihan' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'tanggal_mulai' => 'required|date',
            'tanggal_selesai' => 'nullable|date|after_or_equal:tanggal_mulai',
            'lokasi' => 'nullable|string|max:255',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $data = $request->only(['nama_pelatihan', 'deskripsi', 'tanggal_mulai', 'tanggal_selesai', 'lokasi']);

        if ($request->hasFile('gambar')) {
            if ($pelatihan->gambar) {
                Storage::disk('public')->delete($pelatihan->gambar);
            }
            $data['gambar'] = $request->file('gambar')->store('pelatihans', 'public');
        }

        $pelatihan->update($data);

        return redirect()->route('pelatihans.index')->with('success', 'Pelatihan berhasil diperbarui');
    }

    // Hapus pelatihan
    public function destroy(Pelatihan $pelatihan)
    {
        if ($pelatihan->gambar) {
            Storage::disk('public')->delete($pelatihan->gambar);
        }

        $pelatihan->delete();
        return redirect()->route('pelatihans.index')->with('success', 'Pelatihan berhasil dihapus.');
    }

    // Tampilkan jadwal pelatihan
    public function jadwal()
    {
        $pelatihans = Pelatihan::orderBy('tanggal_mulai', 'asc')->get();
        return view('pelatihans.jadwal', compact('pelatihans'));
    }
}
