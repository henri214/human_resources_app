<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Job>
 */
class JobFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->jobTitle(),
            'description' => $this->faker->paragraph(),
            'type' => $this->faker->randomElement(['full-time', 'part-time', 'contract']),
            'location' => $this->faker->city(),
            'status' => $this->faker->randomElement(['open', 'closed']),
        ];
    }
}
