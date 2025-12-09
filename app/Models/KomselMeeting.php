<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class KomselMeeting extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'komsel_id',
        'tanggal_pertemuan',
        'tema',
        'materi',
        'jumlah_hadir',
        'catatan',
        'foto',
    ];

    protected $casts = [
        'tanggal_pertemuan' => 'date',
        'jumlah_hadir' => 'integer',
    ];

    public function komsel()
    {
        return $this->belongsTo(Komsel::class);
    }
}
