<?php

namespace App\Http\Controllers;

use App\Models\Kontak;
use Illuminate\Http\Request;

class KontakController extends Controller
{
    // Tampilkan semua pesan kontak (untuk admin)
    public function index()
    {
        $kontaks = Kontak::orderBy('created_at', 'desc')->get();
        return view('kontaks.index', compact('kontaks'));
    }

    // Form kontak dari admin panel (opsional)
    public function create()
    {
        return view('kontaks.create');
    }

    // Simpan pesan dari frontend (template Medicio)
    public function store(Request $request)
    {
        $request->validate([
            'nama'   => 'required|string|max:100',
            'email'  => 'required|email|max:100',
            'subjek' => 'nullable|string|max:150',
            'pesan'  => 'required|string',
        ]);

        Kontak::create([
            'name'    => $request->nama,
            'email'   => $request->email,
            'subject' => $request->subjek,
            'message' => $request->pesan,
            'status'  => 'new',
        ]);

        return redirect()->back()->with('success', 'Pesan berhasil dikirim.');
    }

    // Tambahkan di dalam class KontakController
    public function frontendStore(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|email|max:100',
            'subjek' => 'required|string|max:150',
            'pesan' => 'required|string',
        ]);

        Kontak::create([
            'name'    => $request->nama,
            'email'   => $request->email,
            'subject' => $request->subjek,
            'message' => $request->pesan,
            'status'  => 'new',
        ]);

        return redirect()->back()->with('success', 'Pesan berhasil dikirim!');
    }


    // Form edit (khusus admin)
    public function edit(Kontak $kontak)
    {
        return view('kontaks.edit', compact('kontak'));
    }

    // Update dari admin panel
    public function update(Request $request, Kontak $kontak)
    {
        $request->validate([
            'name'    => 'required|string|max:100',
            'email'   => 'required|email|max:100',
            'subject' => 'nullable|string|max:150',
            'message' => 'required|string',
        ]);

        $kontak->update([
            'name'    => $request->name,
            'email'   => $request->email,
            'subject' => $request->subject,
            'message' => $request->message,
        ]);

        return redirect()->route('kontaks.index')->with('success', 'Kontak berhasil diperbarui.');
    }

    // Hapus pesan
    public function destroy(Kontak $kontak)
    {
        $kontak->delete();
        return redirect()->route('kontaks.index')->with('success', 'Pesan berhasil dihapus.');
    }
}
