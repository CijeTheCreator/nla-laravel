<?php

namespace App\Livewire;

use Livewire\Component;

class CurrentIssueSection extends Component
{
    public $volumes;

    public $currentVolume;

    public $articles = [];

    public function mount()
    {
        // Mock volumes
        $this->volumes = collect([
            (object) [
                '_id' => 'vol-001',
                'name' => 'Volume 12, Issue 1',
                'date' => 'January 2026',
            ],
        ]);

        $this->currentVolume = $this->volumes->first();

        $this->articles = [
            (object) [
                '_id' => 'art-001',
                'name' => 'Decentralized Governance in Modern Protocols',
                'authors' => ['Alice Johnson', 'Bob Smith'],
                'pages' => '1-12',
            ],
            (object) [
                '_id' => 'art-002',
                'name' => 'Scalable Smart Contract Architectures',
                'authors' => ['Carol Williams'],
                'pages' => '13-27',
            ],
        ];
    }

    public function render()
    {
        return view('livewire.current-issue-section');
    }
}
