<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Assessment extends Model
{
    use HasFactory;

    // Sihir untuk mengizinkan Laravel mengisi semua 135 kolom data secara massal
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}