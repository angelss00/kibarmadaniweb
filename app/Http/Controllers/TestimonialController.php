<?php
namespace App\Http\Controllers;

use App\Models\Testimonial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TestimonialController extends Controller
{
    // Menampilkan semua testimoni
    public function index()
    {
        $testimonials = Testimonial::paginate(10);  // Menggunakan pagination jika ada banyak data
        return view('testimonials.index', compact('testimonials'));
    }

    // Menampilkan form untuk menambah testimoni
    public function create()
    {
        return view('testimonials.create');
    }

    // Menyimpan testimoni baru
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'testimony' => 'required|string',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $testimonial = new Testimonial();
        $testimonial->name = $request->name;
        $testimonial->testimony = $request->testimony;

        if ($request->hasFile('photo')) {
            $path = $request->file('photo')->store('testimonials', 'public');
            $testimonial->photo = $path;
        }

        $testimonial->save();

        return redirect()->route('testimonials.index')->with('success', 'Testimoni berhasil ditambahkan!');
    }

    // Menampilkan form untuk mengedit testimoni
    public function edit($id)
    {
        $testimonial = Testimonial::findOrFail($id);
        return view('testimonials.edit', compact('testimonial'));
    }

    // Memperbarui testimoni yang sudah ada
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string',
            'testimony' => 'required|string',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $testimonial = Testimonial::findOrFail($id);
        $testimonial->name = $request->name;
        $testimonial->testimony = $request->testimony;

        if ($request->hasFile('photo')) {
            // Hapus foto lama dari storage
            if ($testimonial->photo) {
                Storage::delete('public/' . $testimonial->photo);
            }
            $path = $request->file('photo')->store('testimonials', 'public');
            $testimonial->photo = $path;
        }

        $testimonial->save();

        return redirect()->route('testimonials.index')->with('success', 'Testimoni berhasil diperbarui!');
    }

    // Menghapus testimoni
    public function destroy($id)
    {
        $testimonial = Testimonial::findOrFail($id);

        // Hapus foto dari storage
        if ($testimonial->photo) {
            Storage::delete('public/' . $testimonial->photo);
        }

        $testimonial->delete();

        return redirect()->route('testimonials.index')->with('success', 'Testimoni berhasil dihapus!');
    }
}
