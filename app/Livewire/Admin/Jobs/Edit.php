<?php

namespace App\Livewire\Admin\Jobs;

use Livewire\Component;
use App\Models\Job;
use App\Http\Requests\StoreJobRequest;

class Edit extends Component
{
    public $job;
    public function mount($id)
    {
        $this->job =  Job::findOrFail($id);
    }
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
    public function update()
    {
        $this->validate();

        $this->job->update();

        session()->flash('success', 'Job updated successfully.');
        return redirect()->route('jobsindex');
    }
    public function render()
    {
        return view('livewire.admin.jobs.edit');
    }
}
