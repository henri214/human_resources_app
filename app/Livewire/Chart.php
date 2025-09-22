<?php

namespace App\Livewire;

use Livewire\Component;

class Chart extends Component
{
    public $jobStatuses;
    public $interviewStatuses;


    public function mount($jobStatuses = null, $interviewStatuses = null, $title = "Chart")
    {
        if (is_object($jobStatuses) && method_exists($jobStatuses, 'toArray')) {
            $this->jobStatuses = $jobStatuses->toArray();
        } else {
            $this->jobStatuses = is_array($jobStatuses) ? $jobStatuses : [];
        }
        if (is_object($interviewStatuses) && method_exists($interviewStatuses, 'toArray')) {
            $this->interviewStatuses = $interviewStatuses->toArray();
        } else {
            $this->interviewStatuses = is_array($interviewStatuses) ? $interviewStatuses : [];
        }
    }

    public function render()
    {
        return view('livewire.chart');
    }
}
