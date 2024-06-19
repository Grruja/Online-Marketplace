<?php

namespace App\Livewire;

use App\Models\Category;
use Livewire\Component;

class SelectCategory extends Component
{
    public string $attribute = '';
    public string $placeholder = '';

    public function render()
    {
        return view('livewire.select-category', [
            'categories' => Category::with('subcategory')->get(),
            'attribute' => $this->attribute,
            'placeholder' => $this->placeholder,
        ]);
    }
}
