<?php

namespace App\Livewire;

use App\Models\Listing;
use Livewire\Component;

class CreateListing extends Component
{
    public string $title = '';
    public ?float $price = null;
    public string $condition = '';
    public string $category = '';
    public string $description = '';

    public function createListing(): void
    {
        Listing::create(array_merge(
            ['user_id' => auth()->id()],
            $this->only(['title', 'price', 'condition', 'category', 'description'])
        ));

        $this->reset();
        $this->redirectRoute('dashboard', navigate: true);
    }

    public function render()
    {
        return view('livewire.create-listing');
    }
}
