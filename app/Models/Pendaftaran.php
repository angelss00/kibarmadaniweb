<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pendaftaran extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama','email','telepon','alamat','pelatihan_id','catatan'
    ];

    public function pelatihan()
    {
        return $this->belongsTo(Pelatihan::class);
    }
}
