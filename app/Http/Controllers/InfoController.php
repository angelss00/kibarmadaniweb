<?php

namespace App\Http\Controllers;

use App\Models\Info;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class InfoController extends Controller
{
    // LIST DATA
    public function index(Request $r)
    {
        $q = Info::with('kategori');

        // filter opsional
        if ($r->filled('q')) {
            $q->where(function ($w) use ($r) {
                $w->where('judul', 'like', '%' . $r->q . '%')
                    ->orWhere('isi', 'like', '%' . $r->q . '%');
            });
        }
        if ($r->filled('slider_name')) {
            $q->where('slider_name', $r->slider_name);
        }
        if ($r->filled('active')) {
            $q->where('is_active', (bool) $r->active);
        }

        $infos = $q->orderBy('sort_order')->orderByDesc('id')->paginate(15);
        return view('infos.index', compact('infos'));
    }

    // FORM CREATE
    public function create(Request $r)
    {
        $kategoris = Kategori::orderBy('nama')->get();
        $defaultSlider = $r->get('slider_name', 'homepage-hero');
        return view('infos.create', compact('kategoris', 'defaultSlider'));
    }

    // SIMPAN DATA BARU
    public function store(Request $request)
    {
        $data = $request->validate([
            'kategori_id' => 'nullable|exists:kategoris,id',
            'judul'       => 'required|string|max:255',
            'subtitle'    => 'nullable|string|max:255',
            'isi'         => 'nullable|string',
            'slider_name' => 'nullable|string|max:100',
            'button_text' => 'nullable|string|max:50',
            'link_url'    => 'nullable|url|max:255',
            'sort_order'  => 'nullable|integer|min:0',
            'is_active'   => 'sometimes|boolean',
            'start_at'    => 'nullable|date',
            'end_at'      => 'nullable|date|after_or_equal:start_at',
            'gambar'      => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $data['is_active'] = (bool) ($data['is_active'] ?? 0);

        // sort_order default = max+1
        if (!isset($data['sort_order'])) {
            $max = Info::when($data['slider_name'] ?? null, fn($q, $name) => $q->where('slider_name', $name))
                ->max('sort_order');
            $data['sort_order'] = (int) $max + 1;
        }

        if ($request->hasFile('gambar')) {
            $data['gambar'] = $request->file('gambar')->store('sliders', 'public');
        }

        Info::create($data);
        return redirect()->route('infos.index')->with('status', 'Slide/Info berhasil ditambahkan.');
    }

    // FORM EDIT
    public function edit(Info $info)
    {
        $kategoris = Kategori::orderBy('nama')->get();
        return view('infos.edit', compact('info', 'kategoris'));
    }

    // UPDATE DATA
    public function update(Request $request, Info $info)
    {
        $data = $request->validate([
            'kategori_id' => 'nullable|exists:kategoris,id',
            'judul'       => 'required|string|max:255',
            'subtitle'    => 'nullable|string|max:255',
            'isi'         => 'nullable|string',
            'slider_name' => 'nullable|string|max:100',
            'button_text' => 'nullable|string|max:50',
            'link_url'    => 'nullable|url|max:255',
            'sort_order'  => 'nullable|integer|min:0',
            'is_active'   => 'sometimes|boolean',
            'start_at'    => 'nullable|date',
            'end_at'      => 'nullable|date|after_or_equal:start_at',
            'gambar'      => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $data['is_active'] = (bool) ($data['is_active'] ?? 0);

        if ($request->hasFile('gambar')) {
            if ($info->gambar) Storage::disk('public')->delete($info->gambar);
            $data['gambar'] = $request->file('gambar')->store('sliders', 'public');
        }

        $info->update($data);
        return redirect()->route('infos.index')->with('status', 'Slide/Info berhasil diperbarui.');
    }

    // HAPUS
    public function destroy(Info $info)
    {
        if ($info->gambar) Storage::disk('public')->delete($info->gambar);
        $info->delete();
        return redirect()->route('infos.index')->with('status', 'Slide/Info berhasil dihapus.');
    }
    public function deleteConfirm(Info $info)
    {
        return view('infos.delete', compact('info'));
    }

    // OPSIONAL: REORDER
    public function reorder(Request $request)
    {
        $data = $request->validate(['orders' => 'required|array']);
        foreach ($data['orders'] as $id => $order) {
            Info::where('id', $id)->update(['sort_order' => (int)$order]);
        }
        return back()->with('status', 'Urutan disimpan.');
    }

    // OPSIONAL: TOGGLE
    public function toggle(Info $info)
    {
        $info->is_active = !$info->is_active;
        $info->save();
        return back()->with('status', 'Status slide diubah.');
    }
}
