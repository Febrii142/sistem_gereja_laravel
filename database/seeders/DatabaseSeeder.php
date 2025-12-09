<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Jemaat;
use App\Models\Persembahan;
use App\Models\JadwalIbadah;
use App\Models\Pelayanan;
use App\Models\Komsel;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Seed roles and permissions first
        $this->call([
            RoleSeeder::class,
            ChurchSettingSeeder::class,
        ]);

        // Create dummy jemaats
        Jemaat::factory(50)->create();

        // Create pelayanans
        Pelayanan::factory(5)->create();

        // Create komsels
        Komsel::factory(5)->create();

        // Create persembahans
        Persembahan::factory(20)->create();

        // Create jadwal ibadahs
        JadwalIbadah::factory(10)->create();
    }
}
