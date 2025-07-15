<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kontak extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'email', 'subject', 'message', 'phone', 'status', 'responded_at'
    ];

    protected $casts = [
        'responded_at' => 'datetime',
    ];
}
