<?php

namespace App\Livewire\Admin\Communications;

use App\Models\Communication;
use Livewire\Component;

class Show extends Component
{
    public $communication;

    public function mount($id)
    {
        $this->communication = Communication::findOrFail($id);
    }
    public function render()
    {
        return view('livewire.admin.communications.show');
    }
}
