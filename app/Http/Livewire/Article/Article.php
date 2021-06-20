<?php

namespace App\Http\Livewire\Article;

use App\Models\Article as ModelsArticle;
use Livewire\Component;

class Article extends Component
{


    public $article;

    public function mount($id)
    {
        $this->article = ModelsArticle::find($id);
    }

    public function render()
    {
        return view('livewire.article.article');
    }
}
