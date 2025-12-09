<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Pelayanan>
 */
class PelayananFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nama_pelayanan' => $this->faker->unique()->randomElement(['Singer', 'Worship', 'Multimedia', 'Usher', 'Penyambut', 'Kolektan', 'Pemandu', 'Doa']),
            'deskripsi' => $this->faker->sentence(),
            'is_active' => true,
        ];
    }
}
