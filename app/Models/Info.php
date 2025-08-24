<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Info extends Model
{
    protected $table = 'infos';

    protected $fillable = [
        'kategori_id',
        'slider_name',
        'judul',
        'subtitle',
        'isi',
        'gambar',
        'button_text',
        'link_url',
        'sort_order',
        'is_active',
        'start_at',
        'end_at',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'start_at'  => 'datetime',
        'end_at'    => 'datetime',
    ];

    // ==== Scopes untuk slider/frontend ====
    public function scopeSlider(Builder $q, string $name): Builder {
        return $q->where('slider_name', $name);
    }
    public function scopeActive(Builder $q): Builder {
        return $q->where('is_active', true);
    }
    public function scopeScheduled(Builder $q, $at = null): Builder {
        $at = $at ?? now();
        return $q->where(fn($w)=>$w->whereNull('start_at')->orWhere('start_at','<=',$at))
                 ->where(fn($w)=>$w->whereNull('end_at')->orWhere('end_at','>=',$at));
    }
    public function scopeOrdered(Builder $q): Builder {
        return $q->orderBy('sort_order')->orderBy('id');
    }

    // Relasi opsional
    public function kategori() {
        return $this->belongsTo(\App\Models\Kategori::class, 'kategori_id');
    }
}
