<?php

namespace App\Livewire\Admin\Interviews;

use Livewire\Component;
use App\Models\Interview;
use App\Models\Candidate;
use App\Models\Job;

class Create extends Component
{
    public $candidate_id;
    public $job_id;
    public $interview;

    protected function rules()
    {
        return [
            'interview.candidate_id' => 'required|exists:candidates,id',
            'interview.job_id'       => 'nullable|exists:jobs_candidates,id',
            'interview.scheduled_at' => 'required|date|after:now',
            'interview.location_or_link' => 'nullable|string|max:255',
            'interview.status'       => 'required|in:scheduled,completed,canceled',
            'interview.notes'        => 'nullable|string|max:2000',
        ];
    }
    public function mount()
    {
        $this->interview = new Interview();
    }

    public function save()
    {
        $validated = $this->validate();

        $this->interview->save($validated);

        session()->flash('success', 'Interview created successfully.');

        return redirect()->route('interviewsindex');
    }

    public function render()
    {
        return view('livewire.admin.interviews.create', [
            'candidates' => Candidate::all(),
            'jobs'       => Job::all(),
        ]);
    }
}
