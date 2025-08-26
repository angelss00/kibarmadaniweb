<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\DownloadCategory;

class FileDownload extends Model
{
    use HasFactory;

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
        'download_count',
    ];

    protected $casts = [
        'download_count' => 'integer',
    ];

    // ✅ Relasi ke kategori
    public function Kategori()
    {
        return $this->belongsTo(DownloadCategory::class, 'category_id');
    }
}
