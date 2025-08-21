<?php

namespace App\Http\Controllers;

use App\Models\Pendaftaran;
use App\Models\Pelatihan;
use Illuminate\Http\Request;

class PendaftaranController extends Controller
{
    public function index()
    {
        $pendaftarans = Pendaftaran::with('pelatihan')->latest()->get();
        return view('pendaftarans.index', compact('pendaftarans'));
    }

    public function create()
    {
        $pelatihans = Pelatihan::all();
        return view('pendaftarans.create', compact('pelatihans'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|email',
            'telepon' => 'required|string|max:20',
            'alamat' => 'required|string|max:500',
            'pelatihan_id' => 'required|exists:pelatihans,id',
            'catatan' => 'nullable|string|max:1000',
        ]);

        Pendaftaran::create($request->all());

        return redirect()->route('pendaftarans.create')->with('success', 'Pendaftaran berhasil!');
    }

    public function destroy($id)
    {
        Pendaftaran::findOrFail($id)->delete();
        return back()->with('success', 'Data berhasil dihapus!');
    }
}
