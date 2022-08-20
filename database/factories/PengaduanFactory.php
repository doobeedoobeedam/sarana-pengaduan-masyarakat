<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class PengaduanFactory extends Factory
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
            'masyarakat_id' => $faker->randomDigitNotNull(),
            'isi_laporan' => $faker->paragraph(10),
            'status' => $faker->randomElement(['0', 'proses', 'selesai']),
        ];
    }
}
