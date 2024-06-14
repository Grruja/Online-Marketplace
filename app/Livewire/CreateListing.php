<?php

namespace App\Livewire;

use App\Models\Listing;
use Livewire\Component;

class CreateListing extends Component
{
    public string $title = '';
    public string $price = '';
    public string $condition = '';
    public string $category = '';
    public string $description = '';

    public function rules(): array
    {
        return [
            'title' => 'required|string|min:2|max:255',
            'price' => 'required|numeric|min:0.1',
            'condition' => 'required|in:' . implode(',', config('listing.condition')),
            'category' => 'required|in:' . implode(',', config('listing.category')),
            'description' => 'required|string|min:10|max:1000',
        ];
    }

    public function updated($propertyName): void
    {
        $this->validateOnly($propertyName);
    }

    public function createListing(): void
    {
        $this->validate();

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
