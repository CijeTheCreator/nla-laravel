<?php

namespace App\Livewire;

use App\Models\Volume as AppVolume;
use Livewire\Component;

class Volume extends Component
{
    public AppVolume $volume;

    public function mount(string $volumeId)
    {
        $this->volume = AppVolume::with('articles')->findOrFail($volumeId);
    }

    public function render()
    {
        return view('livewire.volume', [
            'articles' => $this->volume->articles()->orderBy('pages', 'desc')->get(),
        ]);
    }
}
