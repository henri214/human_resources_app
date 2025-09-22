<?php

namespace App\Livewire\Admin\Candidates;

use App\Models\Candidate;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;
use function Livewire\Volt\rules;

class Edit extends Component
{

    use WithFileUploads;

    public $candidate;
    public $image;
    public function rules()
    {
        return [
            'candidate.name'   => 'required|string|max:255',
            'candidate.email'  => 'required|email|max:255',
            'candidate.phone'  => 'nullable|string|max:20',
            'candidate.status' => 'required|in:looking,assigned,hired,archived',
            'candidate.notes'  => 'nullable|string|max:1000',
            'image' => 'nullable|image|max:1024', // 1MB max
        ];
    }
    public function mount($id)
    {
        $this->candidate =  Candidate::findOrFail($id);
    }
    public function update()
    {
        $this->validate();
        // Handle new image upload
        if ($this->image) {
            $this->candidate->profile_image = $this->image->store('images/candidates', 'public');
        }

        // Save candidate
        $this->candidate->update();

        // Optionally, you can redirect or emit an event after saving
        return redirect()->with('message', 'Candidate updated successfully.')
            ->route('candidatesindex');
    }
    public function render()
    {
        return view('livewire.admin.candidates.edit');
    }
}
