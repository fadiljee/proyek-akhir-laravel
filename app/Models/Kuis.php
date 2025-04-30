<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kuis extends Model
{
    protected $fillable = ['pertanyaan', 'materi_id'];

    // Relasi ke Materi
    public function materi()
    {
        return $this->belongsTo(Materi::class);
    }
}
