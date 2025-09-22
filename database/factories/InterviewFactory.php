<?php

namespace Database\Factories;

use App\Models\Candidate;
use App\Models\Job;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Interview>
 */
class InterviewFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'candidate_id' => Candidate::factory(),
            'job_id' => Job::factory(),
            'scheduled_at' => $this->faker->dateTimeBetween('+1 days', '+1 month'),
            'location_or_link' => $this->faker->url(),
            'status' => $this->faker->randomElement(['scheduled', 'completed', 'canceled']),
            'notes' => $this->faker->sentence(),
        ];
    }
}
