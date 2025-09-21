<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\LoginBanner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;

class LoginBannerController extends Controller
{
    // LIST
    public function index()
    {
        $banners = LoginBanner::orderBy('sort_order')->orderBy('id')->paginate(10);
        return view('admin.login_banners.index', compact('banners'));
    }

    // FORM CREATE
    public function create()
    {
        return view('admin.login_banners.create');
    }

    // SIMPAN BARU
    public function store(Request $request)
    {
        Log::info('Store called', $request->all());

        $data = $request->validate([
            'image'      => ['required', 'image', 'max:4096'],
            'quote'      => ['required', 'string', 'max:1000'],
            'author'     => ['nullable', 'string', 'max:255'],
            'sort_order' => ['nullable', 'integer', 'min:0'],
            'is_active'  => ['nullable', 'boolean'],
        ]);

        Log::info('Validated data', $data);

        $path = $request->file('image')->store('login/banners', 'public');
        Log::info('Uploaded file path: ' . $path);

        $banner = \App\Models\LoginBanner::create([
            'image_path' => $path,
            'quote'      => $data['quote'],
            'author'     => $data['author'] ?? null,
            'sort_order' => $data['sort_order'] ?? 0,
            'is_active'  => (bool)($request->boolean('is_active', true)),
        ]);

        Log::info('Banner saved', $banner->toArray());

        return redirect()->route('admin.login_banners.index')->with('success', 'Banner dibuat.');
    }

    // FORM EDIT
    public function edit(LoginBanner $login_banner)
    {
        return view('admin.login_banners.edit', ['banner' => $login_banner]);
    }

    // UPDATE
    public function update(Request $request, LoginBanner $login_banner)
    {
        $data = $request->validate([
            'image'      => ['nullable', 'image', 'max:4096'],
            'quote'      => ['required', 'string', 'max:1000'],
            'author'     => ['nullable', 'string', 'max:255'],
            'sort_order' => ['nullable', 'integer', 'min:0'],
            'is_active'  => ['nullable', 'boolean'],
        ]);

        if ($request->hasFile('image')) {
            if ($login_banner->image_path && Storage::disk('public')->exists($login_banner->image_path)) {
                Storage::disk('public')->delete($login_banner->image_path);
            }
            $login_banner->image_path = $request->file('image')->store('login/banners', 'public');
        }

        $login_banner->quote      = $data['quote'];
        $login_banner->author     = $data['author'] ?? null;
        $login_banner->sort_order = $data['sort_order'] ?? $login_banner->sort_order;
        $login_banner->is_active  = (bool)($data['is_active'] ?? false);
        $login_banner->save();

        return redirect()->route('admin.login_banners.index')->with('success', 'Banner diupdate.');
    }

    // HAPUS
    public function destroy(LoginBanner $login_banner)
    {
        if ($login_banner->image_path && Storage::disk('public')->exists($login_banner->image_path)) {
            Storage::disk('public')->delete($login_banner->image_path);
        }
        $login_banner->delete();

        return redirect()->route('admin.login_banners.index')->with('success', 'Banner dihapus.');
    }

    // TOGGLE AKTIF/NONAKTIF
    public function toggle(LoginBanner $login_banner)
    {
        $login_banner->is_active = ! $login_banner->is_active;
        $login_banner->save();

        return back()->with('success', 'Status banner diubah.');
    }

    // REORDER CEPAT
    public function reorder(Request $request)
    {
        $request->validate([
            'orders' => ['required', 'array'],
        ]);

        foreach ($request->orders as $id => $order) {
            LoginBanner::where('id', $id)->update(['sort_order' => (int)$order]);
        }

        return back()->with('success', 'Urutan disimpan.');
    }
}
