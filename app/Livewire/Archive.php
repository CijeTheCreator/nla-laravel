<?php

namespace App\Livewire;

use App\Models\Volume;
use Livewire\Component;

class Archive extends Component
{
    public function render()
    {
        return view('livewire.archive', [
            'volumes' => Volume::query()->withCount('articles')->orderBy('date', 'desc')->get(),
        ]);
    }
}
