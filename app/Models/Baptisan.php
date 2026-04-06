<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Baptisan extends Model
{
    use HasFactory;

    protected $fillable = [
        'jemaat_id',
        'tanggal_baptis',
        'tempat_baptis',
        'pendeta_pembaptis',
        'catatan',
    ];

    protected $casts = [
        'tanggal_baptis' => 'date',
    ];

    public function jemaat()
    {
        return $this->belongsTo(Jemaat::class);
    }
}
