<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class MenuController extends Controller
{
    public function index()
    {
        $menus = Menu::with('parent')
            ->orderBy('urutan')           // urutan utama
            ->orderByDesc('created_at')   // kalau urutannya sama, terbaru duluan
            ->get();


        $parentOptions = Menu::orderBy('urutan')->get();
        return view('menus.index', compact('menus', 'parentOptions'));
    }

    public function create()
    {
        $parentOptions = Menu::orderBy('urutan')->get();
        return view('menus.create', compact('parentOptions'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nama'      => ['required', 'string', 'max:255'],
            'url'       => ['required', 'string', 'max:255'],
            'type' => ['required', 'string', 'in:scroll,url,visi,misi,makna'],
            // 'url' kamu isi anchor: visi/misi/makna
            'slug'      => ['nullable', 'string', 'max:255'],
            'parent_id' => ['nullable', 'integer', 'exists:menus,id'],
            'urutan'    => ['nullable', 'integer', 'min:0'],
        ]);

        // buat slug otomatis kalau kosong
        $data['slug'] = $data['slug'] ?? \Illuminate\Support\Str::slug($data['nama']);

        Menu::create($data);

        return redirect()->route('menus.index')->with('success', 'Menu berhasil ditambahkan.');
    }


    public function edit($id)
    {
        $menu = Menu::findOrFail($id);
        $parentOptions = Menu::where('id', '!=', $menu->id)
            ->orderBy('urutan')
            ->get();

        return view('menus.edit', compact('menu', 'parentOptions'));
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'nama'      => ['required', 'string', 'max:255'],
            'url'       => ['required', 'string', 'max:255'],
            'type' => ['required', 'string', 'in:scroll,url,visi,misi,makna'],
            // 'url' kamu isi anchor: visi/misi/makna
            'slug'      => ['nullable', 'string', 'max:255'],
            'parent_id' => ['nullable', 'integer', 'exists:menus,id'],
            'urutan'    => ['nullable', 'integer', 'min:0'],
        ]);

        $menu = Menu::findOrFail($id);

        // slug otomatis kalau kosong
        $data['slug'] = $data['slug'] ?? \Illuminate\Support\Str::slug($data['nama']);

        $menu->update($data);

        return redirect()->route('menus.index')->with('success', 'Menu berhasil diperbarui.');
    }


    public function destroy($id)
    {
        $menu = Menu::findOrFail($id);
        $menu->delete();

        return redirect()->route('menus.index')->with('success', 'Menu berhasil dihapus.');
    }
}
