<?php

namespace App\Livewire;

use App\Models\Article as AppArticle;
use Livewire\Component;

class Article extends Component
{
    public AppArticle $article;

    public function mount($articleId)
    {
        $this->article = AppArticle::query()->where('id', $articleId)->first();
    }

    public function render()
    {
        return view('livewire.article', [
            'article' => $this->article,
            'volumeId' => $this->article->volume()->value('id'),
        ]);
    }
}
