<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;

class Komsel extends Model
{
    use HasFactory, SoftDeletes, LogsActivity;

    protected $fillable = [
        'nama_komsel',
        'ketua_id',
        'co_leader_id',
        'lokasi_pertemuan',
        'jadwal_pertemuan',
        'deskripsi',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->logOnly(['nama_komsel', 'is_active'])
            ->logOnlyDirty()
            ->dontSubmitEmptyLogs();
    }

    public function ketua()
    {
        return $this->belongsTo(Jemaat::class, 'ketua_id');
    }

    public function coLeader()
    {
        return $this->belongsTo(Jemaat::class, 'co_leader_id');
    }

    public function members()
    {
        return $this->belongsToMany(Jemaat::class, 'komsel_members')
            ->withTimestamps()
            ->withPivot('tanggal_bergabung');
    }

    public function meetings()
    {
        return $this->hasMany(KomselMeeting::class);
    }
}
