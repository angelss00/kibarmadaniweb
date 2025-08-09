<?php

namespace App\Http\Controllers;

use App\Models\GalerryCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class GalerryCategoryController extends Controller
{
    public function index()
    {
        $categories = GalerryCategory::latest()->get();
        return view('galerry_categories.index', compact('categories'));
    }

    public function create()
    {
        return view('galerry_categories.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        GalerryCategory::create([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
        ]);

        return redirect()->route('galerry_categories.index')->with('success', 'Kategori berhasil ditambahkan.');
    }

    public function edit(GalerryCategory $galerry_category)
    {
        return view('galerry_categories.edit', compact('galerry_category'));
    }

    public function update(Request $request, GalerryCategory $galerry_category)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $galerry_category->update([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
        ]);

        return redirect()->route('galerry_categories.index')->with('success', 'Kategori berhasil diperbarui.');
    }

    public function destroy(GalerryCategory $galerry_category)
    {
        $galerry_category->delete();
        return redirect()->route('galerry_categories.index')->with('success', 'Kategori berhasil dihapus.');
    }
}
