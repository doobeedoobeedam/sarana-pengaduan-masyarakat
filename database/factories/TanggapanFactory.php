<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Tanggapan>
 */
class TanggapanFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $faker = \Faker\Factory::create();
        return [
            'pengaduan_id' => $faker->randomDigitNotNull(),
            'status' => $faker->randomElement(['proses', 'selesai']),
            'tanggapan' => $faker->paragraph(2),
            'petugas_id' => $faker->randomDigitNotNull(),
        ];
    }
}
