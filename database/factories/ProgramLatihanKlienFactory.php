<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ProgramLatihanKlien>
 */
class ProgramLatihanKlienFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'klien_id' => 1,
            'nama_program' => $this->faker->sentence(),
            'durasi_menit' => $this->faker->numberBetween(30, 60),
            'tanggal' => $this->faker->date(),
            'keterangan' => $this->faker->sentence(),
            'user_id' => 1
        ];
    }
}
