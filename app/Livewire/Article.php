<?php

namespace App\Livewire;

use Livewire\Component;

class Article extends Component
{
    public $volumeId = 001;

    public $article = [];

    public function mount()
    {
        $this->article = (object) [
            'name' => 'The unbecoming',
            'authors' => ['John', 'Doe'],
            'publishDate' => '2025',
            'pdfUrl' => 'https://google.com',
            'views' => '2',
            'downloads' => '2',
        ];
    }

    public function render()
    {
        return view('livewire.article');
    }
}
