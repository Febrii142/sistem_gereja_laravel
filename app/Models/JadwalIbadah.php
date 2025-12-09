<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class JadwalIbadah extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'nama_ibadah',
        'tanggal_waktu',
        'lokasi',
        'tema_ibadah',
        'ayat_bacaan',
        'pendeta',
        'pengkhotbah',
        'singer',
        'worship_team',
        'operator_multimedia',
        'penyambut',
        'usher',
        'kolektan',
        'pembaca_firman',
        'doa',
        'keterangan',
    ];

    protected $casts = [
        'tanggal_waktu' => 'datetime',
    ];

    public function pelayans()
    {
        return $this->belongsToMany(Pelayan::class, 'jadwal_pelayans')
            ->withTimestamps();
    }
}
