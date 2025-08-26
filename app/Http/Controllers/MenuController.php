<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function index()
    {
        // Ambil menu utama (yang parent_id-nya null) dan urutkan berdasarkan 'urutan'
        $menus = Menu::whereNull('parent_id')->orderBy('urutan')->get();

        // Kirim data menu ke view 'index'
        return view('menus.index', compact('menus'));
    }
    public function create()
    {
        return view('menus.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'url' => 'required|string|max:255',
            'type' => 'required|string|in:route,scroll,url',
            'slug' => 'required|string',
            'urutan' => 'required|string',
        ]);

        Menu::create($request->only(['nama', 'url', 'type','slug','urutan',]));

        return redirect()->route('menus.index')->with('success', 'Menu berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $menu = Menu::findOrFail($id);
        return view('menus.edit', compact('menu'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'url' => 'required|string|max:255',
            'type' => 'required|string|in:route,scroll,url',
            'slug' => 'required|string',
            'urutan' => 'required|string',
        ]);

        $menu = Menu::findOrFail($id);
        $menu->update($request->only(['nama', 'url', 'type','slug','urutan',]));

        return redirect()->route('menus.index')->with('success', 'Menu berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $menu = Menu::findOrFail($id);
        $menu->delete();

        return redirect()->route('menus.index')->with('success', 'Menu berhasil dihapus.');
    }
}
