<?php

namespace App\Livewire\Admin\Jobs;

use App\Models\Job;
use Livewire\Component;
use Livewire\WithoutUrlPagination;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination, WithoutUrlPagination;
    public function delete($id)
    {
        $job = Job::find($id);
        $job->delete();
        session()->flash('message', 'job deleted successfully');
    }
    public function render()
    {
        return view(
            'livewire.admin.jobs.index',
            [
                'jobs' => Job::latest()->paginate(10)
            ]
        );
    }
}
