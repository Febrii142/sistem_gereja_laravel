<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;

class Jemaat extends Model
{
    use HasFactory, SoftDeletes, LogsActivity;

    protected $fillable = [
        'user_id',
        'nama_lengkap',
        'nik',
        'tempat_lahir',
        'tanggal_lahir',
        'jenis_kelamin',
        'alamat',
        'no_telepon',
        'no_hp',
        'email',
        'status_pernikahan',
        'pekerjaan',
        'pendidikan_terakhir',
        'status_keanggotaan',
        'tanggal_baptis',
        'tanggal_sidi',
        'foto',
        'is_active',
        'komsel_id',
        'keluarga_id',
        'status_wakil_keluarga',
    ];

    protected $casts = [
        'tanggal_lahir' => 'date',
        'tanggal_baptis' => 'date',
        'tanggal_sidi' => 'date',
        'is_active' => 'boolean',
        'status_wakil_keluarga' => 'boolean',
    ];

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->logOnly(['nama_lengkap', 'nik', 'status_keanggotaan', 'is_active'])
            ->logOnlyDirty()
            ->dontSubmitEmptyLogs();
    }

    // Relationships
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function keluarga()
    {
        return $this->belongsTo(Keluarga::class);
    }

    public function baptisans()
    {
        return $this->hasMany(Baptisan::class);
    }

    public function komsel()
    {
        return $this->belongsTo(Komsel::class);
    }

    public function pelayanan()
    {
        return $this->belongsToMany(Pelayanan::class, 'pelayans')
            ->withTimestamps()
            ->withPivot('is_active');
    }

    public function komselMembers()
    {
        return $this->hasMany(KomselMember::class);
    }
}
