<?php

namespace App\Http\Controllers;

use App\Models\FileDownload;
use App\Models\DownloadCategory;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class FileDownloadController extends Controller
{

    public function index()
    {
        $downloads = FileDownload::with('kategori')
            ->orderBy('created_at', 'desc')
            ->paginate(9);

        return view('file_downloads.index', compact('downloads'));
        
    }
    public function filedownloadPage()
    {
        $downloads = FileDownload::with('kategori')
            ->orderBy('created_at', 'desc')
            ->paginate(9);

        return view('filedownload', compact('downloads'));
    }


    public function download(FileDownload $file)
    {
        $filePath = public_path($file->path); // misal path tersimpan di DB
        if (file_exists($filePath)) {
            return response()->download($filePath);
        }
        return redirect()->back()->with('error', 'File tidak ditemukan.');
    }
    public function create()
    {
        $kategoris = Kategori::all();
        return view('file_downloads.create', compact('kategoris'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title'      => 'required|max:255',
            'file'       => 'required|file|max:20480', // max 20MB
            'kategori_id' => 'nullable|id',
            'status'     => 'required|in:draft,published,archived',
            'uploader'   => 'nullable|max:100',
        ]);

        // simpan file
        $path = $request->file('file')->store('downloads', 'public');

        FileDownload::create([
            'title'         => $request->title,
            'slug'          => Str::slug($request->title),
            'description'   => $request->description,
            'file_path'     => '/storage/' . $path,
            'kategori_id'   => $request->kategori_id,
            'file_type'     => $request->file->getClientOriginalExtension(),
            'file_size'     => $request->file->getSize(),
            'uploader'      => $request->uploader,
            'status'        => $request->status,
            'download_count' => 0,
        ]);

        return redirect()->route('file_downloads.index')->with('success', 'File berhasil ditambahkan.');
    }

    public function edit(FileDownload $fileDownload)
    {
        $categories = DownloadCategory::all();
        return view('file_downloads.edit', compact('fileDownload', 'categories'));
    }

    public function update(Request $request, FileDownload $fileDownload)
    {
        $request->validate([
            'title'      => 'required|max:255',
            'kategori_id' => 'nullable|exists:kategoris,id',
            'status'     => 'required|in:draft,published,archived',
            'uploader'   => 'nullable|max:100',
        ]);

        $fileDownload->update([
            'title'       => $request->title,
            'slug'        => Str::slug($request->title),
            'description' => $request->description,
            'kategori_id' => $request->kategori_id,
            'status'      => $request->status,
            'uploader'    => $request->uploader,
        ]);

        return redirect()->route('file_downloads.index')->with('success', 'File berhasil diperbarui.');
    }

    public function destroy(FileDownload $fileDownload)
    {
        // Hapus file fisik jika ada
        if ($fileDownload->file_path && Storage::disk('public')->exists(str_replace('/storage/', '', $fileDownload->file_path))) {
            Storage::disk('public')->delete(str_replace('/storage/', '', $fileDownload->file_path));
        }

        $fileDownload->delete();
        return redirect()->route('file_downloads.index')->with('success', 'File berhasil dihapus.');
    }
}
