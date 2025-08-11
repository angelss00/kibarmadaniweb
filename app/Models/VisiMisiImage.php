<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VisiMisiImage extends Model
{
    protected $table = 'visi_misi_images';

    protected $fillable = ['visi_misi_id', 'image_path'];

    public function visiMisi()
    {
        return $this->belongsTo(VisiMisi::class);
    }
}
