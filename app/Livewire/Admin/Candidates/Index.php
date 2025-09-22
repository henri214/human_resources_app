<?php

namespace App\Livewire\Admin\Candidates;

use App\Models\Candidate;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\Features\SupportPagination\WithoutUrlPagination;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination, WithoutUrlPagination;
    public function delete($id)
    {
        $candidate = Candidate::find($id);
        if ($candidate->profile_image) {
            Storage::disk('public')->delete($candidate->profile_image);
        }
        $candidate->delete();
        session()->flash('message', 'Candidate deleted successfully');
    }
    public function render()
    {
        return view(
            'livewire.admin.candidates.index',
            [
                'candidates' => Candidate::latest()->paginate(10)
            ]
        );
    }
}
