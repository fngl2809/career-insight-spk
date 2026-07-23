<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Assessment extends Model
{
    use HasFactory;

    protected $guarded = [];

    // Tambahkan kodingan ini:
    protected $casts = [
        'detail_skor' => 'array',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}