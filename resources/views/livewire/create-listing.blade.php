<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <h1 class="p-6 text-gray-900">
                    Add Your Listing
                </h1>
            </div>
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6 mt-10">
                <form>
                    <div>
                        <x-input-label for="title" :value="__('Title')" />
                        <x-text-input id="title" class="block mt-1 w-full" />
                    </div>
                    <div class="mt-5">
                        <x-input-label for="description" :value="__('Description')" />
                        <textarea id="description" class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm block mt-1 w-full"></textarea>
                    </div>
                    <div class="mt-5">
                        <x-input-label for="condition" :value="__('Condition')" />
                        <select id="condition" class="cursor-pointer border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm block mt-1 w-full">
                            <option disabled selected value=""></option>
                            @foreach(config('listing.condition') as $condition)
                                <option value="{{ $condition }}">{{ ucwords($condition) }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mt-5">
                        <x-input-label for="price" :value="__('Price')" />
                        <input id="price" type="number" class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm block mt-1 w-full">
                    </div>
                    <div class="mt-5">
                        <x-input-label for="category" :value="__('Category')" />
                        <select id="category" class="cursor-pointer border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm block mt-1 w-full">
                            <option disabled selected value=""></option>
                            @foreach(config('listing.category') as $category)
                                <option value="{{ $category }}">{{ ucwords($category) }}</option>
                            @endforeach
                        </select>
                    </div>

                    <x-primary-button wire:loading.class="opacity-70" class="mt-10">
                        <x-spinner-button>{{ __('Create') }}</x-spinner-button>
                    </x-primary-button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
