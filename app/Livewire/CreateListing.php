<?php

namespace App\Livewire;

use App\Models\Listing;
use App\Models\ListingImage;
use App\Services\ImageService;
use Illuminate\Http\UploadedFile;
use Livewire\Component;
use Livewire\WithFileUploads;

class CreateListing extends Component
{
    use WithFileUploads;

    public string $title = '';
    public string $price = '';
    public string $condition = '';
    public string $category = '';
    public ?UploadedFile $image = null;
    public string $description = '';

    protected function rules(): array
    {
        return [
            'title' => 'required|string|min:2|max:255',
            'price' => 'required|numeric|min:0.1',
            'condition' => 'required|in:'.implode(',', config('listing.condition')),
            'category' => 'required|in:'.implode(',', config('listing.category')),
            'image' => 'required|image|mimes:jpeg,jpg,png|max:5120',
            'description' => 'required|string|min:10|max:1000',
        ];
    }

    public function updated(string $propertyName): void
    {
        $this->validateOnly($propertyName);
    }

    public function createListing(): void
    {
        $this->validate();

        $listing = Listing::create(array_merge(
            ['user_id' => auth()->id()],
            $this->only(['title', 'price', 'condition', 'category', 'description'])
        ));

        $imagePath = app(ImageService::class)->storeImageReturnPath($this->image);
        ListingImage::create(['listing_id' => $listing->id, 'image' => $imagePath,]);

        session()->flash('success', 'Listing created successfully.');
        $this->redirectRoute('dashboard', navigate: true);
    }

    public function render()
    {
        return view('livewire.create-listing');
    }
}
