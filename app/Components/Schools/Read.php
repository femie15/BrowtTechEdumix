<?php

namespace App\Components\Schools;

use App\Models\School;
use Livewire\Component;

class Read extends Component
{
    public $school;

    public function mount(School $school)
    {
        $this->school = $school;
    }

    public function render()
    {
        return view('schools.read');
    }
}
