<?php

namespace Database\Factories;

use App\Models\Candidate;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Communication>
 */
class CommunicationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $type = $this->faker->randomElement(['email', 'whatsapp']);

        return [
            'candidate_id' => Candidate::factory(),
            'type' => $type,
            'subject' => $type === 'email' ? $this->faker->sentence() : null,
            'message' => $this->faker->paragraph(),
            'sent_at' => $this->faker->dateTimeBetween('-1 month', 'now'),
            'status' => $this->faker->randomElement(['sent', 'failed']),
        ];
    }
}
