<?php

use Livewire\Volt\Component;

new class extends Component {
    public $candidate;
    public function mount($candidate)
    {
        $this->candidate = $candidate;
    }
    public function selectCandidate($id)
    {
        session(['candidate_id' => $this->candidate->id]);
        return $this->redirectIntended(URL::previous());
    }
}; ?>

<div>
    <flux:menu.item wire:click='selectCandidate({{ $candidate->id }})'>
        {{ $candidate->name }}
    </flux:menu.item>
</div>
