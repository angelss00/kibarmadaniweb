<?php

namespace App\Http\Controllers;

use App\Models\Kontak;
use Illuminate\Http\Request;

class KontakController extends Controller
{
    // Tampilkan semua pesan kontak
    public function index()
    {
        $kontaks = Kontak::orderBy('created_at', 'desc')->get();
        return view('kontaks.index', compact('kontaks'));
    }

    // Form kirim pesan
    public function create()
    {
        return view('kontaks.create');
    }

    // Simpan pesan baru
    public function store(Request $request)
    {
        $request->validate([
            'name'    => 'required|string|max:100',
            'email'   => 'required|email|max:100',
            'subject' => 'nullable|string|max:150',
            'message' => 'required|string',
            'phone'   => 'nullable|string|max:20',
        ]);

        Kontak::create([
            'name'    => $request->name,
            'email'   => $request->email,
            'subject' => $request->subject,
            'message' => $request->message,
            'phone'   => $request->phone,
            'status'  => 'new',
        ]);

        return redirect()->route('kontaks.index')->with('success', 'Pesan berhasil dikirim.');
    }

    // Form edit status pesan (untuk admin)
    public function edit(kontak $kontak)
    {
        return view('kontaks.edit', compact('kontak'));
    }

    // Update status pesan
    public function update(Request $request, Kontak $kontak)
{
    $request->validate([
        'name'    => 'required|string|max:100',
        'email'   => 'required|email|max:100',
        'message' => 'required|string',
    ]);

    $kontak->update([
        'name'    => $request->name,
        'email'   => $request->email,
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
