<?php

namespace App\Http\Livewire\Index;

use Livewire\Component;

class ArticleCard extends Component
{

    public $article;

    public function mount($article)
    {
        $this->article = $article;
    }

    public function render()
    {
        return view('livewire.index.article-card');
    }
}
