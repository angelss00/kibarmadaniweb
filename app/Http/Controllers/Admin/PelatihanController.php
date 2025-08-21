<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pelatihan;
use Illuminate\Http\Request;

class PelatihanController extends Controller
{
    public function index()
    {
        $pelatihans = Pelatihan::latest()->get();
        return view('pelatihans.index', compact('pelatihans'));
    }

    public function create()
    {
        return view('pelatihans.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_pelatihan' => 'required|string|max:255',
            'tanggal_mulai' => 'required|date',
            'tanggal_selesai' => 'nullable|date|after_or_equal:tanggal_mulai',
            'lokasi' => 'nullable|string|max:255',
        ]);

        $data = $request->all();

        Pelatihan::create($data);

        return redirect()->route('pelatihans.index')->with('success', 'Pelatihan berhasil ditambahkan.');
    }

    public function edit(Pelatihan $pelatihan)
    {
        return view('pelatihans.edit', compact('pelatihan'));
    }

    public function update(Request $request, Pelatihan $pelatihan)
    {
        $request->validate([
            'nama_pelatihan' => 'required|string|max:255',
            'tanggal_mulai' => 'required|date',
            'tanggal_selesai' => 'nullable|date|after_or_equal:tanggal_mulai',
            'lokasi' => 'nullable|string|max:255',
        ]);

        $data = $request->all();
        $pelatihan->update($data);

        return redirect()->route('pelatihans.index')->with('success', 'Pelatihan berhasil diperbarui.');
    }

    public function destroy(Pelatihan $pelatihan)
    {
        $pelatihan->delete();
        return redirect()->route('pelatihans.index')->with('success', 'Pelatihan berhasil dihapus.');
    }

    public function jadwal()
    {
        $pelatihans = Pelatihan::orderBy('tanggal_mulai', 'asc')->get();
        return view('pelatihans.jadwal', compact('pelatihans'));
    }
}
