<?php

namespace Database\Seeders;

use App\Models\Candidate;
use App\Models\Interview;
use App\Models\Job;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class InterviewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $candidates = Candidate::all();
        $jobs = Job::all();

        foreach ($candidates as $candidate) {
            Interview::factory()->count(rand(0, 3))->create([
                'candidate_id' => $candidate->id,
                'job_id' => $jobs->random()->id,
            ]);
        }
    }
}
