<?php

namespace Database\Seeders;

use App\Models\Candidate;
use App\Models\Communication;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CommunicationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $candidates = Candidate::all();

        foreach ($candidates as $candidate) {
            Communication::factory()->count(rand(1, 5))->create([
                'candidate_id' => $candidate->id,
            ]);
        }
    }
}
