<?php

namespace Database\Seeders;

use App\Models\Candidate;
use App\Models\Job;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CandidateJobSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $candidates = Candidate::all();
        $jobs = Job::all();

        $candidates->each(function ($candidate) use ($jobs) {
            $candidate->jobs()->attach(
                $jobs->random(rand(1, 3))->pluck('id')->toArray()
            );
        });
    }
}
