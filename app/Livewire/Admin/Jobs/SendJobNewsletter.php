<?php

namespace App\Livewire\Admin\Jobs;

use Livewire\Component;
use Spatie\Newsletter\Newsletter;
use App\Models\Job;

class SendJobNewsletter extends Component
{
    public $job_id;
    public $jobs;

    public function mount()
    {
        // Load all jobs to choose from
        $this->jobs = Job::all();
    }

    public function sendNewsletter()
    {
        $job = Job::find($this->job_id);

        if (!$job) {
            session()->flash('error', 'Job not found.');
            return;
        }

        // Build email content
        $emailContent = view('emails.job_announcement', ['job' => $job])->render();

        // Send email via Mailchimp
        try {
            Newsletter::send([
                'email' => null, // null = send to your list
                'merge_fields' => [
                    'JOB_TITLE' => $job->title,
                    'JOB_DESCRIPTION' => $job->description,
                    'JOB_LINK' => route('jobs.show', $job),
                ],
                'html' => $emailContent,
            ]);

            session()->flash('success', 'Job newsletter sent!');
        } catch (\Exception $e) {
            session()->flash('error', $e->getMessage());
        }
    }

    public function render()
    {
        return view('livewire.send-job-newsletter');
    }
}
