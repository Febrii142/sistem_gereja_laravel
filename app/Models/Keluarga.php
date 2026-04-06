<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Keluarga extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_keluarga',
        'kepala_keluarga_id',
        'alamat_keluarga',
        'nomor_rumah',
        'rt',
        'rw',
        'kode_keluarga',
    ];

    public function kepalaKeluarga()
    {
        return $this->belongsTo(Jemaat::class, 'kepala_keluarga_id');
    }

    public function anggota()
    {
        return $this->hasMany(Jemaat::class, 'keluarga_id');
    }
}
