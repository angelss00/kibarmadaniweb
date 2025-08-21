<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pelatihan extends Model
{
    protected $fillable = [
        'nama_pelatihan',
        'tanggal_mulai',
        'tanggal_selesai',
        'lokasi',
    ];

    public function pendaftarans()
    {
        return $this->hasMany(\App\Models\Pendaftaran::class);
    }
}
