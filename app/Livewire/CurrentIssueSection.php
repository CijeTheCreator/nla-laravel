<?php

namespace App\Livewire;

use App\Models\Volume;
use Livewire\Component;

class CurrentIssueSection extends Component
{
    public ?Volume $currentIssue;

    public function mount()
    {
        $this->currentIssue = Volume::query()->with('articles')->where('isCurrent', true)->first();
    }

    public function render()
    {

        return view('livewire.current-issue-section', [
            'volume' => $this->currentIssue,
        ]);
    }
}
