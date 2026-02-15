<?php

namespace App\Livewire;

use Livewire\Component;

class Volume extends Component
{
    public $volumeId;

    public $volumes = [[
        '_id' => '001',
        'name' => 'Volume 1',
        'articleCount' => '2',
        'date' => '2027',
    ], ];

    public function mount()
    {
        $this->volumes = collect($this->volumes);
    }

    public function render()
    {
        return view('livewire.volume');
    }
}
