<?php

namespace App\Http\Controllers;

use App\Models\DownloadCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class DownloadCategoryController extends Controller
{
    public function index()
    {
        $categories = DownloadCategory::orderBy('name')->get();
        return view('download_categories.index', compact('categories'));
    }

    public function create()
    {
        return view('download_categories.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:100',
        ]);

        DownloadCategory::create([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
        ]);

        return redirect()->route('download-categories.index')->with('success', 'Kategori berhasil ditambahkan.');
    }

    public function edit(DownloadCategory $downloadCategory)
    {
        return view('download_categories.edit', compact('downloadCategory'));
    }

    public function update(Request $request, DownloadCategory $downloadCategory)
    {
        $request->validate([
            'name' => 'required|max:100',
        ]);

        $downloadCategory->update([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
        ]);

        return redirect()->route('download-categories.index')->with('success', 'Kategori berhasil diperbarui.');
    }

    public function destroy(DownloadCategory $downloadCategory)
    {
        $downloadCategory->delete();
        return redirect()->route('download-categories.index')->with('success', 'Kategori berhasil dihapus.');
    }
}
