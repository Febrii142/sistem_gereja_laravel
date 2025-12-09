<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\JadwalIbadah>
 */
class JadwalIbadahFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nama_ibadah' => $this->faker->randomElement(['Ibadah Minggu Pagi', 'Ibadah Minggu Sore', 'Ibadah Rabu Doa', 'Ibadah Pemuda', 'Ibadah Keluarga']),
            'tanggal_waktu' => $this->faker->dateTimeBetween('now', '+1 month'),
            'lokasi' => $this->faker->randomElement(['Gedung Utama', 'Aula Besar', 'Kapel', 'Gedung Pemuda']),
            'tema_ibadah' => $this->faker->sentence(),
            'ayat_bacaan' => $this->faker->randomElement(['Yohanes 3:16', 'Mazmur 23', 'Filipi 4:13', 'Amsal 3:5-6']),
            'pendeta' => $this->faker->name(),
            'pengkhotbah' => $this->faker->name(),
            'singer' => $this->faker->name(),
            'worship_team' => $this->faker->name() . ', ' . $this->faker->name(),
        ];
    }
}
