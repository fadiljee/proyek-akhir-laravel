<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HasilKuis extends Model
{
    use HasFactory;

    protected $fillable = [
        'siswa_id',
        'kuis_id',
        'jawaban_user',
        'benar',
    ];

    // Relasi ke siswa
    public function siswa()
    {
        return $this->belongsTo(Siswa::class);
    }

    // Relasi ke kuis
    public function kuis()
    {
        return $this->belongsTo(Kuis::class);
    }
}
