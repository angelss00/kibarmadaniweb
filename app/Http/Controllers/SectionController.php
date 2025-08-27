<?php

namespace App\Http\Controllers;

use App\Models\Section;
use Illuminate\Http\Request;

class SectionController extends Controller
{
    public function index(Request $request)
    {
        $type = $request->get('type'); // null | keunggulan | layanan | visi | misi | makna

        $sections = Section::query()
            ->when($type, fn($q) => $q->where('type', $type))
            ->orderBy('order')
            ->paginate(15)
            ->withQueryString();

        return view('admin.sections.index', compact('sections', 'type'));
    }

    public function create()
    {
        return view('admin.sections.create', [
            'section' => new Section(), // instance kosong untuk form
        ]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'type'        => 'required|in:keunggulan,layanan,visi,misi,makna',
            'title'       => 'required|string|max:255',
            'description' => 'required|string',
            'order'       => 'nullable|integer|min:0',
        ]);

        Section::create($data);

        return redirect()
            ->route('sections.index')
            ->with('success', 'Section berhasil ditambahkan.');
    }

    public function edit(Section $section)
    {
        return view('admin.sections.edit', compact('section'));
    }

    public function update(Request $request, Section $section)
    {
        $data = $request->validate([
            'type'        => 'required|in:keunggulan,layanan,visi,misi,makna',
            'title'       => 'required|string|max:255',
            'description' => 'required|string',
            'order'       => 'nullable|integer|min:0',
        ]);

        $section->update($data);

        return redirect()
            ->route('sections.index')
            ->with('success', 'Section berhasil diperbarui.');
    }

    public function destroy(Section $section)
    {
        $section->delete();

        return redirect()
            ->route('sections.index')
            ->with('success', 'Section berhasil dihapus.');
    }
}
