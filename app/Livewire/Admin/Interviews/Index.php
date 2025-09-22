<?php

namespace App\Livewire\Admin\Interviews;

use App\Models\Interview;
use Livewire\Component;
use Livewire\WithoutUrlPagination;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination, WithoutUrlPagination;
    // public $jobId;

    public function delete($id)
    {
        $interview = Interview::find($id);

        $interview->delete();
        session()->flash('message', 'Interview deleted successfully');
    }
    public function render()
    {
        return view(
            'livewire.admin.interviews.index',
            [
                'interviews' => Interview::latest()->paginate(10)
            ]
        );
    }
}
