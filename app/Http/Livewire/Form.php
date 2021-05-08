<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\Product;
use Livewire\Component;

class Form extends Component
{
    public $categories;
    public $requestedProducts;


    public function mount()
    {
        $this->categories = Category::all();
    }

    public function render()
    {
        return view('livewire.form');
    }
}
