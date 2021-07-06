<?php

namespace App\Http\Livewire\Search;

use App\Models\Article;
use App\Models\Category;
use Livewire\Component;
use Livewire\WithPagination;

class Search extends Component
{

    use WithPagination;

    public $categories;
    public $categoryId;
    public $char="";


    public function mount($catId , $char = ""){

        $this->categories = Category::all();
        $this->categoryId = $catId;
        $this->char = $char;
    }

    public function render()
    {

        if($this->categoryId == 0) {

            $result = Article::where('h_title' , 'like' , '%'.$this->char.'%')
            ->orWhere('top_title' , 'like' , '%'.$this->char.'%')
            ->orWhere('text' , 'like' , '%'.$this->char.'%')
            ->paginate(8);
            $articles = $result;

        } else{

            $result = Article::where([
                ['category_id' , $this->categoryId],
                ['h_title' , 'like' , '%'.$this->char.'%'],
            ])->orWhere([
                ['category_id' , $this->categoryId],
                ['top_title' , 'like' , '%'.$this->char.'%'],
            ])->orWhere([
                ['category_id' , $this->categoryId],
                ['text' , 'like' , '%'.$this->char.'%'],
            ])->paginate(8);

            $articles = $result;
        }

        return view('livewire.search.search' , ['articles' => $articles]);
    }
}
