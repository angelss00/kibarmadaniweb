<?php

namespace App\Http\Controllers;

use App\Models\Section;
use Illuminate\Http\Request;

class SectionController extends Controller
{
    public function index(Request $request)
    {
        $type = $request->get('type'); // null | keunggulan | layanan

        $sections = Section::query()
            ->when($type, fn($q) => $q->where('type', $type))
            ->orderBy('order')
            ->paginate(10)
            ->withQueryString();

        return view('admin.sections.index', compact('sections', 'type'));
    }

    public function create()
    {
        return view('admin.sections.create', [
            'section' => new \App\Models\Section(), // <— kirim instance kosong
        ]);
    }




    public function store(Request $request)
    {
        $data = $request->validate([
            'type'        => 'required|in:keunggulan,layanan',
            'title'       => 'required|string|max:255',
            'description' => 'required|string',
            'order'       => 'nullable|integer',
        ]);

        Section::create($data);
        return redirect()->route('sections.index')
            ->with('success', 'Data berhasil ditambahkan');
    }

    public function edit(Section $section)
    {
        return view('admin.sections.edit', compact('section'));
    }

    public function update(Request $request, Section $section)
    {
        $data = $request->validate([
            'type'        => 'required|in:keunggulan,layanan',
            'title'       => 'required|string|max:255',
            'description' => 'required|string',
            'order'       => 'nullable|integer',
        ]);

        $section->update($data);
        return redirect()->route('sections.index')
            ->with('success', 'Data berhasil diperbarui');
    }

    public function destroy(Section $section)
    {
        $section->delete();
        return redirect()->route('sections.index')
            ->with('success', 'Data berhasil dihapus');
    }
}
