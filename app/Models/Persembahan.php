<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;

class Persembahan extends Model
{
    use HasFactory, SoftDeletes, LogsActivity;

    protected $fillable = [
        'tanggal_persembahan',
        'jenis_persembahan',
        'nominal',
        'keterangan',
        'nama_pemberi',
        'metode_pembayaran',
        'created_by',
    ];

    protected $casts = [
        'tanggal_persembahan' => 'date',
        'nominal' => 'decimal:2',
    ];

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->logOnly(['jenis_persembahan', 'nominal', 'metode_pembayaran'])
            ->logOnlyDirty()
            ->dontSubmitEmptyLogs();
    }

    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
}
