<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VisiMisi extends Model
{
    protected $table = 'visi_misi';

    protected $fillable = ['visi', 'misi', 'makna_kibar'];

    // Relasi one-to-many ke gambar
    public function images()
    {
        return $this->hasMany(VisiMisiImage::class);
    }
}
