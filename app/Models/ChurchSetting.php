<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ChurchSetting extends Model
{
    protected $fillable = [
        'nama_gereja',
        'alamat',
        'no_telepon',
        'email',
        'website',
        'logo',
        'gembala_pendeta',
        'timezone',
        'date_format',
    ];
}
