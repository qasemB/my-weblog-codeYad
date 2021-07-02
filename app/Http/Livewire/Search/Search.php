<?php

namespace App\Http\Livewire\Search;

use Livewire\Component;

class Search extends Component
{

    public function mount($catId , $char = ""){
        dd([$catId , $char]);
    }

    public function render()
    {
        return view('livewire.search.search');
    }
}
