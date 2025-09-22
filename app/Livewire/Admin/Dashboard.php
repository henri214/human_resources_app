<?php

namespace App\Livewire\Admin;

use App\Models\Interview;
use App\Models\Job;
use Livewire\Component;

class Dashboard extends Component
{


    public function render()
    {
        $jobStatuses = Job::selectRaw('status, COUNT(*) as count')
            ->groupBy('status')
            ->pluck('count', 'status');

        $interviewStatuses = Interview::selectRaw('status, COUNT(*) as count')
            ->groupBy('status')
            ->pluck('count', 'status');
        return view('livewire.admin.dashboard', [
            'jobStatuses' => $jobStatuses,
            'interviewStatuses' => $interviewStatuses,
        ]);
    }
}
