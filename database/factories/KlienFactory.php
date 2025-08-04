<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Klien>
 */
class KlienFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nama' => $this->faker->name(),
            'jenis_kelamin' => $this->faker->randomElement(['Laki-laki', 'Perempuan']),
            'tgl_lahir' => $this->faker->date(),
            'usia' => $this->faker->randomNumber(2),
            'tinggi_badan' => $this->faker->randomNumber(2),
            'berat_badan' => $this->faker->randomNumber(2),
            'target_berat_badan' => $this->faker->randomNumber(2),
            'pekerjaan' => $this->faker->jobTitle(),
            'riwayat_cedera' => $this->faker->sentence(),
            'user_id' => 1,
        ];
    }
}
