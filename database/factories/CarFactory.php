<?php

namespace Database\Factories;

use App\Models\License;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Car>
 */
class CarFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'model' => $this->faker->name(),
            'color' => $this->faker->colorName(),
            'year' => $this->faker->year(),
            'plate_number' => $this->faker->randomNumber(),
            'owner_id' => License::factory(),
        ];
    }
}
