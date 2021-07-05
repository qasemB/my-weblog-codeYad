<?php

namespace App\Http\Livewire\Search;

use App\Models\Article;
use App\Models\Category;
use Livewire\Component;

class Search extends Component
{

    public $articles;
    public $categories;
    public $categoryId;
    public $char="";

    public function updatedCategoryId(){
        return redirect()->to('/search/'.$this->categoryId.'/'.$this->char);
    }

    public function updatedChar(){
        return redirect()->to('/search/'.$this->categoryId.'/'.$this->char);
    }

    public function mount($catId , $char = ""){

        $this->categories = Category::all();
        $this->categoryId = $catId;
        $this->char = $char;

        if($catId == 0) {

            $result = Article::where('h_title' , 'like' , '%'.$char.'%')
            ->orWhere('top_title' , 'like' , '%'.$char.'%')
            ->orWhere('text' , 'like' , '%'.$char.'%')
            ->get();
            $this->articles = $result;

        } else{

            $result = Article::where([
                ['category_id' , $catId],
                ['h_title' , 'like' , '%'.$char.'%'],
            ])->orWhere([
                ['category_id' , $catId],
                ['top_title' , 'like' , '%'.$char.'%'],
            ])->orWhere([
                ['category_id' , $catId],
                ['text' , 'like' , '%'.$char.'%'],
            ])->get();
            $this->articles = $result;
        }
    }

    public function render()
    {
        return view('livewire.search.search');
    }
}
