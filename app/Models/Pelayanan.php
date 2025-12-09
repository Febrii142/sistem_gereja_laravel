<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;

class Pelayanan extends Model
{
    use HasFactory, SoftDeletes, LogsActivity;

    protected $fillable = [
        'nama_pelayanan',
        'deskripsi',
        'koordinator_id',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->logOnly(['nama_pelayanan', 'is_active'])
            ->logOnlyDirty()
            ->dontSubmitEmptyLogs();
    }

    public function koordinator()
    {
        return $this->belongsTo(Jemaat::class, 'koordinator_id');
    }

    public function pelayans()
    {
        return $this->belongsToMany(Jemaat::class, 'pelayans')
            ->withTimestamps()
            ->withPivot('is_active');
    }
}
