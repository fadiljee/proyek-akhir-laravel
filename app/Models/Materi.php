<?php

namespace App\Models;
use App\Models\Kuis;
use Illuminate\Database\Eloquent\Model;
use App\Models\QuizModel;

class Materi extends Model
{
    // Menambahkan atribut yang boleh diisi secara massal
    protected $fillable = ['judul', 'konten'];

    // Relasi ke Kuis
    public function kuis()
    {
        return $this->hasMany(Kuis::class);
    }
}