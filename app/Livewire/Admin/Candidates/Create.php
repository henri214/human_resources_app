<?php

namespace App\Livewire\Admin\Candidates;

use Illuminate\Support\Facades\Storage;
use App\Models\Candidate;
use Livewire\Component;
use Livewire\WithFileUploads;
use Newsletter;

class Create extends Component
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
    public function mount()
    {
        $this->candidate = new Candidate();
    }
    public function save()
    {
        $validated = $this->validate();

        // Handle new image upload if provided
        if ($this->image) {
            $this->candidate->profile_image = $this->image->store('images/candidates', 'public');
        }

        // Save candidate
        $this->candidate->save($validated);
        // Add a subscriber
        Newsletter::subscribeOrUpdate(
            $this->candidate->email,
            [
                'FNAME' => $this->candidate->name,
                'PHONE' => $this->candidate->phone,
            ]
        );        // Optionally, you can redirect or emit an event after saving
        session()->flash('message', 'Candidate created successfully.');
        return redirect()->route('candidatesindex');
    }
    public function render()
    {
        return view('livewire.admin.candidates.create');
    }
}
