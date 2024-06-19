<div class="py-12">
    <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <h1 class="p-6 text-gray-900">
                Create New Listing
            </h1>
        </div>
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6 mt-10">
            <form wire:submit="createListing">
                <div>
                    <x-input-label for="title" :value="__('Title')" />
                    <x-text-input wire:model.live.debounce.500ms="title" id="title" required class="block mt-1 w-full" />
                    @error('title') <em class="text-red-600 text-sm">{{ $message }}</em> @enderror
                </div>
                <div class="mt-5">
                    <x-input-label for="price" :value="__('Price')" />
                    <x-text-input wire:model.live.debounce.500ms="price" id="price" required class="block mt-1 w-full" />
                    @error('price') <em class="text-red-600 text-sm">{{ $message }}</em> @enderror
                </div>
                <div class="mt-5">
                    <x-input-label for="condition" :value="__('Condition')" />
                    <select wire:model="condition" id="condition" required class="cursor-pointer border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm block mt-1 w-full">
                        <option disabled selected value=""></option>
                        @foreach(config('listing.condition') as $condition)
                            <option value="{{ $condition }}">{{ ucwords($condition) }}</option>
                        @endforeach
                    </select>
                    @error('condition') <em class="text-red-600 text-sm">{{ $message }}</em> @enderror
                </div>
                <div class="mt-5">
                    <x-input-label for="category" :value="__('Category')" />
                    <livewire:select-category :attribute="'required'"/>
                    @error('subcategory_id') <em class="text-red-600 text-sm">{{ $message }}</em> @enderror
                </div>
                <div class="mt-5">
                    <p class="block font-medium text-sm text-gray-700 mb-1">Upload Image</p>
                    <x-image-input :image="$image"/>
                </div>
                <div class="mt-5">
                    <x-input-label for="description" :value="__('Description')" />
                    <textarea wire:model.live.debounce.500ms="description" id="description" required class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm block mt-1 w-full" rows="7"></textarea>
                    @error('description') <em class="text-red-600 text-sm">{{ $message }}</em> @enderror
                </div>

                <x-primary-button wire:loading.class="opacity-70" wire:target="createListing" class="mt-10">
                    <x-spinner-button :target="__('createListing')">{{ __('Create') }}</x-spinner-button>
                </x-primary-button>
            </form>
        </div>
    </div>
</div>
