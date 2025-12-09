<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Jemaat;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Jemaat>
 */
class JemaatFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nama_lengkap' => $this->faker->name(),
            'nik' => $this->faker->unique()->numerify('################'),
            'tempat_lahir' => $this->faker->city(),
            'tanggal_lahir' => $this->faker->date('Y-m-d', '-20 years'),
            'jenis_kelamin' => $this->faker->randomElement(['Laki-laki', 'Perempuan']),
            'alamat' => $this->faker->address(),
            'no_telepon' => $this->faker->phoneNumber(),
            'no_hp' => $this->faker->phoneNumber(),
            'email' => $this->faker->unique()->safeEmail(),
            'status_pernikahan' => $this->faker->randomElement(['Belum Menikah', 'Menikah', 'Duda', 'Janda']),
            'pekerjaan' => $this->faker->jobTitle(),
            'pendidikan_terakhir' => $this->faker->randomElement(['SD', 'SMP', 'SMA', 'D3', 'S1', 'S2', 'S3']),
            'status_keanggotaan' => $this->faker->randomElement(['Calon Anggota', 'Anggota Baptis', 'Anggota Sidi', 'Anggota Pindahan']),
            'tanggal_baptis' => $this->faker->optional()->date('Y-m-d', '-5 years'),
            'tanggal_sidi' => $this->faker->optional()->date('Y-m-d', '-3 years'),
            'is_active' => $this->faker->boolean(90), // 90% active
        ];
    }
}
