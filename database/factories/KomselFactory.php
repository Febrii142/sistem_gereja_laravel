<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Jemaat;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Komsel>
 */
class KomselFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nama_komsel' => 'Komsel ' . $this->faker->unique()->word(),
            'lokasi_pertemuan' => $this->faker->address(),
            'jadwal_pertemuan' => $this->faker->randomElement(['Jumat, 19:00', 'Sabtu, 15:00', 'Minggu, 16:00']),
            'deskripsi' => $this->faker->sentence(),
            'is_active' => true,
        ];
    }
}
