<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ChurchSetting;

class ChurchSettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ChurchSetting::create([
            'nama_gereja' => 'Gereja Sample',
            'alamat' => 'Jl. Contoh No. 123, Jakarta',
            'no_telepon' => '021-12345678',
            'email' => 'info@gerejasample.com',
            'website' => 'https://gerejasample.com',
            'gembala_pendeta' => 'Pdt. John Doe, M.Th',
            'timezone' => 'Asia/Jakarta',
            'date_format' => 'Y-m-d',
        ]);
    }
}
