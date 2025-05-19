<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    use HasFactory;

   protected $table = 'data_siswa';

    // Menentukan kolom yang bisa diisi (fillable)
    protected $fillable = ['nisn', 'nama'];

    // Relasi ke HasilKuis
    public function hasilKuis()
    {
        return $this->hasMany(HasilKuis::class);
    }
}
