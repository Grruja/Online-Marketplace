<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <h1 class="p-6 text-gray-900">
                Add Your Listing
            </h1>
        </div>
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6 mt-10">
            <form wire:submit="createListing">
                <div>
                    <x-input-label for="title" :value="__('Title')" />
                    <x-text-input wire:model.blur="title" id="title" class="block mt-1 w-full" />
                    @error('title') <em class="text-red-600 text-sm">{{ $message }}</em> @enderror
                </div>
                <div class="mt-5">
                    <x-input-label for="price" :value="__('Price')" />
                    <x-text-input wire:model.blur="price" id="price" class="block mt-1 w-full" />
                    @error('price') <em class="text-red-600 text-sm">{{ $message }}</em> @enderror
                </div>
                <div class="mt-5">
                    <x-input-label for="condition" :value="__('Condition')" />
                    <select wire:model.blur="condition" id="condition" class="cursor-pointer border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm block mt-1 w-full">
                        <option disabled selected value=""></option>
                        @foreach(config('listing.condition') as $condition)
                            <option value="{{ $condition }}">{{ ucwords($condition) }}</option>
                        @endforeach
                    </select>
                    @error('condition') <em class="text-red-600 text-sm">{{ $message }}</em> @enderror
                </div>
                <div class="mt-5">
                    <x-input-label for="category" :value="__('Category')" />
                    <select wire:model.blur="category" id="category" class="cursor-pointer border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm block mt-1 w-full">
                        <option disabled selected value=""></option>
                        @foreach(config('listing.category') as $category)
                            <option value="{{ $category }}">{{ ucwords($category) }}</option>
                        @endforeach
                    </select>
                    @error('category') <em class="text-red-600 text-sm">{{ $message }}</em> @enderror
                </div>
                <div class="mt-5">
                    <x-input-label for="description" :value="__('Description')" />
                    <textarea wire:model.blur="description" id="description" class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm block mt-1 w-full" rows="7"></textarea>
                    @error('description') <em class="text-red-600 text-sm">{{ $message }}</em> @enderror
                </div>

                <x-primary-button wire:loading.class="opacity-70" wire:target="createListing" class="mt-10">
                    <x-spinner-button :target="__('createListing')">{{ __('Create') }}</x-spinner-button>
                </x-primary-button>
            </form>
        </div>
    </div>
</div>
