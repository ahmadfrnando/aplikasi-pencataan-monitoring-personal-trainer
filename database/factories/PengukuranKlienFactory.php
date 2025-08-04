<?php

namespace Database\Factories;

use App\Models\PengukuranKlien;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PengukuranKlien>
 */
class PengukuranKlienFactory extends Factory
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
            // 'no_urut_pengukuran' => 1,
            'tanggal' => $this->faker->date(),
            'berat_badan' => $this->faker->randomFloat(2, 40, 150),
            'weist_circumference' => $this->faker->randomFloat(2, 10, 50),
            'body_fat' => $this->faker->randomFloat(2, 10, 50),
            'visceral_fat' => $this->faker->randomFloat(2, 5, 30),
            'bmi' => $this->faker->randomFloat(2, 15, 40),
            'body_age' => $this->faker->randomFloat(2, 15, 40),
            'fat_whole_body' => $this->faker->randomFloat(2, 10, 50),
            'fat_trunk' => $this->faker->randomFloat(2, 5, 30),
            'fat_arm' => $this->faker->randomFloat(2, 2, 10),
            'fat_leg' => $this->faker->randomFloat(2, 5, 20),
            'muscle_leg' => $this->faker->randomFloat(2, 10, 40),
            'muscle_arm' => $this->faker->randomFloat(2, 5, 25),
            'muscle_trunk' => $this->faker->randomFloat(2, 10, 50),
            'muscle_whole_body' => $this->faker->randomFloat(2, 50, 120),
            'leher' => $this->faker->randomFloat(2, 20, 40),
            'lengan_kanan_atas' => $this->faker->randomFloat(2, 30, 100),
            'lengan_kanan_bawah' => $this->faker->randomFloat(2, 30, 100),
            'lengan_kiri_atas' => $this->faker->randomFloat(2, 30, 100),
            'lengan_kiri_bawah' => $this->faker->randomFloat(2, 30, 100),
            'dada' => $this->faker->randomFloat(2, 60, 120),
            'pinggang' => $this->faker->randomFloat(2, 50, 100),
            'perut' => $this->faker->randomFloat(2, 50, 120),
            'panggul' => $this->faker->randomFloat(2, 80, 130),
            'paha_kanan' => $this->faker->randomFloat(2, 30, 80),
            'paha_kiri' => $this->faker->randomFloat(2, 30, 80),
            'betis_kiri' => $this->faker->randomFloat(2, 10, 50),
            'betis_kanan' => $this->faker->randomFloat(2, 10, 50),
            'user_id' => 1,
        ];
    }
}
