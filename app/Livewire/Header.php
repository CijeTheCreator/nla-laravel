<?php

namespace App\Livewire;

use App\Models\Volume;
use Livewire\Component;

class Header extends Component
{
    public ?Volume $currentVolume;

    public function mount()
    {
        $this->currentVolume = Volume::query()->where('isCurrent', true)->first();
    }

    public function render()
    {
        return view('livewire.header', [
            'currentVolume' => $this->currentVolume,
        ]);
    }
}
