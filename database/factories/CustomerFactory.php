<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Customer>
 */
class CustomerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nama' => $this->faker->company(),
            'kontak' => $this->faker->phoneNumber(),
            'alamat' => $this->faker->streetAddress() . ', ' . $this->faker->city(),
            'info' => $this->faker->paragraph(),
        ];
    }
}
