<?php

namespace App\Livewire\Admin\Communications;

use App\Models\Communication;
use Livewire\Component;
use Livewire\WithoutUrlPagination;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination, WithoutUrlPagination;
    public function delete($id)
    {
        $communication = Communication::find($id);
        $communication->delete();
        session()->flash('message', 'Communication deleted successfully');
    }

    public function render()
    {
        return view('livewire.admin.communications.index', [
            'communications' => Communication::latest()->paginate(10),
        ]);
    }
}
