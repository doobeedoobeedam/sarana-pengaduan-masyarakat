<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class MasyarakatFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $faker = \Faker\Factory::create();
        $nik = 3276030;
        return [
            'username' => $nik.$faker->randomNumber(9, true),
            'password' => password_hash('password', PASSWORD_DEFAULT), // password
            'nama' => $this->faker->name(),
            'telepon' => $this->faker->phoneNumber(),
        ];
    }
}
