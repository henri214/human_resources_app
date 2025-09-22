<?php

namespace App\Livewire\Admin\Jobs;

use App\Models\Job;
use App\Services\WhatsAppService;
use Livewire\Component;

class WhatsappJobContact extends Component
{
    public $selectedJob;
    public $message;
    public $selectedCandidates = [];

    public function sendJobMessages(WhatsAppService $whatsapp)
    {
        if (!$this->selectedJob) {
            session()->flash('error', 'Please select a job first.');
            return back();
        }

        $job = Job::with('candidates')->find($this->selectedJob);

        foreach ($job->candidates as $candidate) {
            $whatsapp->sendMessage($candidate->phone, $this->message);
        }

        $this->reset(['selectedJob', 'message', 'selectedCandidates']);
        session()->flash('success', 'Messages sent to all candidates for this job!');
    }

    public function render()
    {
        return view('livewire.admin.jobs.whatsapp-job-contact', [
            'jobs' => Job::all(),
            'candidates' => $this->selectedJob
                ? Job::with('candidates')->find($this->selectedJob)->candidates
                : [],
        ]);
    }
}
