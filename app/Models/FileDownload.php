<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\DownloadCategory;
use Illuminate\Support\Str;

class FileDownload extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'description',
        'file_path',
        'kategori_id',
        'file_type',
        'file_size',
        'uploader',
        'status',
        'download_count'
    ];

    public function kategori()
    {
        // sesuaikan model & FK kalau beda
        return $this->belongsTo(\App\Models\Kategori::class, 'kategori_id', 'id');
    }

    // Human readable size: B, KB, MB, GB
    public function getSizeFormattedAttribute(): string
    {
        $bytes = (int) ($this->file_size ?? 0);
        if ($bytes >= 1073741824) return number_format($bytes / 1073741824, 2) . ' GB';
        if ($bytes >= 1048576)   return number_format($bytes / 1048576,   2) . ' MB';
        if ($bytes >= 1024)      return number_format($bytes / 1024,      2) . ' KB';
        return $bytes . ' B';
    }

    public function getFileUrlAttribute(): ?string
    {
        if (!$this->file_path) return null;

        // hilangkan leading slash
        $p = ltrim($this->file_path, '/');

        // Kalau DB sudah /storage/downloads/...
        if (Str::startsWith($p, 'storage/')) {
            return asset($p); // -> /storage/...
        }

        // Kalau DB cuma simpan downloads/...
        return asset('storage/' . $p);
    }


    // Map status ke kelas badge Bootstrap
    public function getStatusBadgeClassAttribute(): string
    {
        return match ($this->status) {
            'published' => 'success',
            'draft'     => 'warning',
            'archived'  => 'secondary',
            default     => 'secondary',
        };
    }
}
