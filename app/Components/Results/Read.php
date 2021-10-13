<?php

namespace App\Components\Results;

use App\Models\Result;
use Livewire\Component;

class Read extends Component
{
    public $result;

    public function mount(Result $result)
    {
        $this->result = $result;
    }

    public function render()
    {
        return view('results.read');
    }
}
