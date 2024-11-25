<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'tingkat',
        'tahun_ajaran',
        'wali_kelas_id'
    ];

    public function waliKelas()
    {
        return $this->belongsTo(User::class, 'wali_kelas_id');
    }

    public function jadwals()
    {
        return $this->hasMany(Jadwal::class);
    }

    public function siswas()
    {
        return $this->hasMany(Siswa::class);
    }
}