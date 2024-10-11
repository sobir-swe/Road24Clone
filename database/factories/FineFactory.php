<?php

namespace Database\Factories;

use App\Models\Car;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Fine>
 */
class FineFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'plate_number' => $this->faker->randomNumber(),
            'amount' => $this->faker->randomFloat(),
            'type' => $this->faker->randomElement(['red_line', 'speed']),
            'car_id' => Car::factory(),
        ];
    }
}
