<?php

namespace App\Http\Livewire\Index;

use App\Models\Article;
use App\Models\Category;
use Livewire\Component;

class Index extends Component
{

    public $newArticles;
    public $bestArticles;

    public $categories ;

    public function mount()
    {
        $this->newArticles = Article::orderBy('id', 'DESC')->take(4)->get();
        $this->bestArticles = Article::where('is_best', 1)->take(4)->get();
        $this->categories = Category::all();
    }

    public function render()
    {
        return view('livewire.index.index');
    }
}
