<?php

namespace App\Livewire\Admin\Interviews;

use App\Models\Candidate;
use App\Models\Interview;
use App\Models\Job;
use Livewire\Component;

class Edit extends Component
{
    public $interview;
    public $candidate_id;
    public $job_id;
    public $scheduled_at;
    public $location_or_link;
    public $status;
    public $notes;

    public function mount(Interview $interview)
    {
        $this->interview = $interview;
        $this->candidate_id = $interview->candidate_id;
        $this->job_id = $interview->job_id;
        $this->scheduled_at = $interview->scheduled_at->format('Y-m-d\TH:i'); // for datetime-local input
        $this->location_or_link = $interview->location_or_link;
        $this->status = $interview->status;
        $this->notes = $interview->notes;
    }

    protected function rules()
    {
        return [
            'candidate_id' => 'required|exists:candidates,id',
            'job_id'       => 'nullable|exists:jobs,id',
            'scheduled_at' => 'required|date|after:now',
            'location_or_link' => 'nullable|string|max:255',
            'status'       => 'required|in:scheduled,completed,canceled',
            'notes'        => 'nullable|string|max:2000',
        ];
    }

    public function update()
    {
        $validated = $this->validate();

        $this->interview->update($validated);

        session()->flash('success', 'Interview updated successfully.');
    }

    public function render()
    {
        return view('livewire.admin.interviews.edit', [
            'candidates' => Candidate::all(),
            'jobs'       => Job::all(),
        ]);
    }
}
