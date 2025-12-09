<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Persembahan>
 */
class PersembahanFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'tanggal_persembahan' => $this->faker->date('Y-m-d', 'now'),
            'jenis_persembahan' => $this->faker->randomElement(['Perpuluhan', 'Syukur', 'Kolekte', 'Misi', 'Pembangunan', 'Lainnya']),
            'nominal' => $this->faker->randomFloat(2, 10000, 5000000),
            'keterangan' => $this->faker->optional()->sentence(),
            'nama_pemberi' => $this->faker->optional()->name(),
            'metode_pembayaran' => $this->faker->randomElement(['Tunai', 'Transfer', 'Kartu', 'Lainnya']),
            'created_by' => User::inRandomOrder()->first()?->id ?? 1,
        ];
    }
}
