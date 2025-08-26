<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage; 

class Info extends Model
{
    use HasFactory;

    // Kolom yang bisa diisi
    protected $fillable = [
        'judul',
        'isi',
        'gambar',
        'is_active',
        'kategori_id',
    ];

    // Jika menggunakan 'timestamps' (created_at dan updated_at)
    public $timestamps = true;

    // Definisikan relasi dengan kategori jika diperlukan
    public function kategori()
    {
         return $this->belongsTo(Kategori::class);
    }

    // Accessor untuk gambar (jika perlu)
    public function getGambarUrlAttribute()
    {
        return $this->gambar ? Storage::url('sliders/' . $this->gambar) : null;
    }

    // Scope untuk mendapatkan slider aktif saja
    public function scopeActive($query)
    {
        return $query->where('is_active', 1);
    }
}
