<?php

namespace App\Livewire\Admin\Jobs;

use Livewire\Component;
use App\Models\Job;
use App\Http\Requests\StoreJobRequest;

class Create extends Component
{
    public $job;
    public function rules()
    {
        return [
            'job.title'       => 'required|string|max:255',
            'job.description' => 'required|string|max:1000',
            'job.type'        => 'required|string|max:50',
            'job.location'    => 'required|string|max:255',
            'job.status'      => 'required|in:open,closed',
        ];
    }
    public function mount()
    {
        $this->job = new Job();
    }
    public function save()
    {

        $this->validate();
        // Save job
        $this->job->save();

        session()->flash('success', 'Job created successfully.');

        return redirect()->route('jobsindex');
    }

    public function render()
    {
        return view('livewire.admin.jobs.create');
    }
}
