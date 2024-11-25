<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    use HasFactory;

    protected $table = 'siswas';
    
    protected $fillable = [
        'nama',
        'nis',
        'kelas',
        'jenis_kelamin',
    ];

    public function absens()
    {
        return $this->hasMany(Absen::class);
    }
}