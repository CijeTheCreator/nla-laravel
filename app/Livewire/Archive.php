<?php

namespace App\Livewire;

use Livewire\Component;

class Archive extends Component
{
    public $volumes = [

        [
            '_id' => 'art-001',
            'name' => 'Decentralized Governance in Modern Protocols',
            'articleCount' => '2',
            'authors' => ['Alice Johnson', 'Bob Smith'],
            'date' => '2021',
            'pages' => '1-12',
        ],
        [
            '_id' => 'art-002',
            'name' => 'Scalable Smart Contract Architectures',
            'articleCount' => '2',
            'authors' => ['Carol Williams'],
            'date' => '2021',
            'pages' => '13-27',
        ],
    ];

    public function mount()
    {
        $this->volumes = collect($this->volumes);
    }

    public function render()
    {
        return view('livewire.archive');
    }
}
